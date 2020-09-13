$(document).ready(function () {
  $("#display").click(function (e) {

    $.ajax({
      type: "GET",
      url: "result.php",
      dataType: "html",
      success: function (response) {
        $("#container").html(response);
      }
    });
  });

  const showElementBox = document.querySelector('.showElementBox')
  const closeBtn = document.querySelector('.closeBtn')
  const tr = [...document.querySelectorAll('tr')];
  const h1Name = document.createElement('h1');
  tr.forEach(item => {
    item.addEventListener('click', () => {
      showElementBox.classList.add('show');
      const dataId = item.dataset.id;
      const dataTitle = item.dataset.title;

      showElementBox.appendChild(h1Name);
      h1Name.textContent = "Movie: " + dataTitle;

      closeBtn.addEventListener('click', () => {
        showElementBox.classList.remove('show');
        h1Name.textContent = "";
      })
    })
  })




});