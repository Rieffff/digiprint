// custom.js

document.addEventListener('DOMContentLoaded', function () {
    // Get the elements
    const idClDropdown = document.getElementById('id_cl');
    const accClassDropdown = document.getElementById('acc_class');
  
    // Function to fetch class data based on selected id_cl
    function fetchClassData() {
      const selectedIdCl = idClDropdown.value;
      // Check if the user has made a choice for id_cl
      if (!selectedIdCl) {
        // If no choice is made, show the "Please choose cl_id first" prompt in accClassDropdown
        accClassDropdown.innerHTML = '<option disabled selected>Silahkan Pilih Sat. Pendidikan Terlebih Dahulu </option>';
        return; // Exit the function early
      }
      // Perform an AJAX request to get the class data
      axios.get(`/api/get-class-data/${selectedIdCl}`)
        .then(response => {
          const classData = response.data;
  
          // Clear existing options in accClassDropdown
          accClassDropdown.innerHTML = '';
  
          // Add new options based on classData
          classData.forEach(classItem => {
            const option = document.createElement('option');
            option.value = classItem.value;
            option.textContent = classItem.text;
            accClassDropdown.appendChild(option);
          });
        })
        .catch(error => {
          console.error(error);
        });
    }
  
    // Event listener to fetch class data when id_cl is changed
    idClDropdown.addEventListener('change', fetchClassData);
  
    // Fetch class data initially on page load
    fetchClassData();
  });
  