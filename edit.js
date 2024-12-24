document.getElementById("editForm").addEventListener("submit", function(event){
    event.preventDefault();
    var formData = new FormData(this);
    fetch('edit.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      alert(data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
  