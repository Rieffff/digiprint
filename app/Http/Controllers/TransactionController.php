<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\ClassLevel;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index()
    {

        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->get();

        // Retrieve all transactions from the database 

        $classLevels = ClassLevel::all();

        return view('transactions.index', compact('transactions', 'classLevels'));
    }

    public function printTransaction(Transaction $transaction)
    {
        return view('transactions.printbyid', compact('transaction'));
    }


    public function print()
    {
        // Retrieve all transactions from the database and group them by account
        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->orderBy('created_at', 'asc') // Order by datecreated in ascending order
            ->get()
            ->groupBy('id_acc'); // Group transactions by id_acc (account ID)

        return view('transactions.print', compact('transactions'));
    }

    public function printUnit($unitName)
    {
        // Retrieve all transactions from the database and group them by account
        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->where('class_levels.cl_name', '=', $unitName)
            ->orderBy('created_at', 'asc') // Order by created_at in ascending order
            ->get()
            ->groupBy('id_acc'); // Group transactions by id_acc (account ID)

        return view('transactions.print', compact('transactions'));
    }

    public function printSelection(Request $request)
    {
        // Retrieve all transactions from the database and group them by account
        // $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
        //     ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
        //     ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
        //     ->orderBy('datecreated', 'asc') // Order by datecreated in ascending order
        //     ->get()
        //     ->groupBy('id_acc'); // Group transactions by id_acc (account ID)


        $daterange = $request->input('daterange');
        $dates = explode(' - ', $daterange);
        $minDate = strtotime($dates[0]);
        $MaxDate = strtotime($dates[1]);
        $awalCetak = date('Y-m-d', $minDate);
        $akhirCetak = date('Y-m-d', $MaxDate);
        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name AS acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->whereBetween('transactions.created_at', ["$awalCetak 00:00:00", "$akhirCetak 23:59:59"])
            ->orderBy('transactions.created_at', 'asc')
            ->get()
            ->groupBy('id_acc');

        return view('transactions.printSelection', compact('transactions', 'awalCetak', 'akhirCetak'));
    }
    public function destroy(Transaction $transaction)
    {
        // Perform the deletion
        $transaction->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
    public function create()
    {
        // show semua user dengan role id 3 (role siswa)
        $users = User::where('id_role', 3)->get();
        $classLevels = ClassLevel::all();

        return view('transactions.create', compact('users', 'classLevels'));
    }

    public function store(Request $request)
    {
        // Generate random 10-digit tr_id
        $tr_id = mt_rand(1000000000, 9999999999);

        // Detail tr
        $transaction = new Transaction();
        $transaction->tr_id = $tr_id;
        $transaction->id_acc = $request->input('id_acc');
        $transaction->tr_debt = $request->has('tr_debt') ? $request->input('tr_debt') : null;

        $transaction->bnr_pjg = $request->has('bnr_pjg') ? $request->input('bnr_pjg') : null;

        $transaction->bnr_tgi = $request->has('bnr_tgi') ? $request->input('bnr_tgi') : null;
        
        $transaction->plong = $request->has('plong') ? $request->input('plong') : null;
        
         $transaction->custPrice = $request->has('custPrice') ? $request->input('custPrice') : null;

        $transaction->konsep = $request->has('konsep') ? $request->input('konsep') : null;
        
        $transaction->jumlahLembar = $request->has('jumlahLembar') ? $request->input('jumlahLembar') : null;


        $transaction->created_at = now();

        // Save ke db
        $transaction->save();


        return redirect()->route('transactions.printTransaction', ['transaction' => $tr_id]);


        return redirect()->route('transactions.index')->with('success', 'New transaction added successfully.');
    }

    public function storeKelas(Request $request)
    {
        if ($request->has('acc_class')) {
            $kelasName = $request->input('acc_class');
        }

        // Retrieve all transactions from the database and group them by account
        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->where('users.acc_class', '=', $kelasName)
            ->orderBy('created_at', 'asc') // Order by created_at in ascending order
            ->get()
            ->groupBy('id_acc'); // Group transactions by id_acc (account ID)



        return view('transactions.print', compact('transactions'));
    }
}
