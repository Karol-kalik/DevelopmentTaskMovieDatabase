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
  const pInfo = document.createElement('p');
  const imgBox = document.querySelector('.showImage')
  const infoContent = document.querySelector('.infoContent')


  tr.forEach((item, index) => {
    if (index === 0) return;

    item.addEventListener('click', () => {
      showElementBox.classList.add('show');
      const dataId = item.dataset.id;
      const dataTitle = item.dataset.title;
      const dataImage = item.dataset.img;
      const dataType = item.dataset.type;
      infoContent.appendChild(h1Name);
      infoContent.appendChild(pInfo);
      h1Name.textContent = "Movie: " + dataTitle;
      pInfo.textContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id magna quis lorem auctor blandit. Etiam rhoncus ut lectus non lobortis. Mauris ut urna sem. Quisque ex leo, malesuada eget mauris eu, blandit lacinia sem. Quisque vehicula dictum commodo. Mauris gravida et massa nec sollicitudin. Aenean vulputate lorem id arcu interdum sagittis. Nam odio odio, sollicitudin in pulvinar suscipit, dictum et nisi. Nulla sed pretium turpis, ac semper tortor. Fusce id tristique leo, id volutpat risus. Nullam ultrices vestibulum pharetra. Quisque fringilla purus sed turpis viverra tincidunt. Mauris at interdum tellus, vitae porta risus. Etiam laoreet ut enim et porta. Nunc posuere dictum augue, sit amet malesuada lectus sagittis a.Duis tempor, risus ac aliquet tincidunt, libero dui volutpat risus, non rhoncus neque magna nec odio.Quisque venenatis mi sed neque faucibus, in auctor elit iaculis.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam massa nibh, iaculis eu odio a, consectetur vulputate mi.Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi feugiat eros et accumsan aliquam.Etiam vitae scelerisque enim.Quisque egestas porttitor blandit.Mauris id convallis tortor.In semper, ante nec posuere imperdiet, erat est faucibus ligula, quis mollis nisi sapien ac urna.Pellentesque urna nibh, blandit id mattis nec, pellentesque ac diam.In sem erat, ornare eget felis interdum, tincidunt condimentum ante.";
      imgBox.src = "./images/" + dataType + "/" + dataImage + ".jpg";

      closeBtn.addEventListener('click', () => {
        showElementBox.classList.remove('show');
        h1Name.textContent = "";
      })
    })
  })




});