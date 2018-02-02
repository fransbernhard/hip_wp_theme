// var x = location.pathname;
// if(x === '/hip/jobs/'){
//   var findLink = $('.menu-item-type-custom').find('a');
//   for (var i = 0; i < findLink.size(); i++) {
//     var attri = findLink.eq(i).attr('href');
//     findLink.eq(i).attr('href', "http://localhost:3000/hip/" + attri);
//   }
// } else {
//   console.log('error! ' + x);
// }

// Prevent slides from reloading on click
// $('.slides').find('a').click(function(e){
//   e.preventDefault();
// })


// function filterEmplyee(cat){
//   console.log("okeeeej: " + cat);
//   switch(cat){
//     case "advise":
//       var items = document.getElementsByClassName('advise');
//       console.log(items);
//       // items.map(function(item) {
//       //   item.classList.add("class");
//       // });
//       Object.keys(items).map(function(item){
//         // item.classList.add("class");
//         console.log("hejE: " + item);
//       });
//       // items.forEach(function (item) {
//       //   item.classList.add("class");
//       // });
//       break;
//     case "board":
//       var items = document.getElementsByClassName('board');
//
//       break;
//     case "team":
//       var items = document.getElementsByClassName('team');
//
//       break;
//     default:
//       console.log("error: " + cat);
//       break;
//   }
// }


// About filter
// $('.advise').hide();
// $('.board').hide();
// $(".team").show();
// $('.filter-emplyee').find('.a').addClass('class');

// $('.filter-emplyee li').click(function(e){
//   console.log("this: " + this.content);
//   e.preventDefault();
  // $('.advise').hide();
  // $('.board').hide();
  // $('.team').hide();
  //
  // var input = this.id;
  // var team = $(".team");
  // var board = $(".board");
  // var advise = $(".advise");
  //
  // switch(input){
  //   case "advise":
  //     $('.filter-emplyee').find('.a, .b').removeClass('class');
  //     $(this).addClass('class');
  //     $(advise).each(function(index, item){
  //       $(item).show();
  //     });
  //     break;
  //   case "board":
  //     $('.filter-emplyee').find('.a, .c').removeClass('class');
  //     $(this).addClass('class');
  //     $(board).each(function(index, item){
  //       $(item).show();
  //     });
  //     break;
  //   case "team":
  //     $('.filter-emplyee').find('.b, .c').removeClass('class');
  //     $(this).addClass('class');
  //     $(team).each(function(index, item){
  //       $(item).show();
  //     });
  //     break;
  // }
// });


// for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
// }

// dots[slideIndex-1].className += " active";
// var dots = document.getElementsByClassName("dot");

// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }
