/*window.onload = function() {
    if (window.jQuery) {
        // jQuery is loaded
        alert("Yeah!");               //just check if jQuery works ?!
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}*/
var a = 5;
console.log(a);

jQuery(document).ready(function(){


    $("#adminForm").submit(function(e){

      e.preventDefault(); // prevents refreshing the page !

      var inputs = $(this).serialize();

      $.post("insertOpp.php",inputs,function(){
          $('.content').load('home.php');
      });
    });
});




const app = {
  pages: [],
  show: new Event('show'),
  init: function(){
    app.pages = document.querySelectorAll('.page');
    app.pages.forEach((pg)=>{
      pg.addEventListener('show',app.pageShown);
    })

    document.querySelectorAll('.nav-link').forEach((link)=>{
      link.addEventListener('click',app.nav);
    })
    history.replaceState({},'Home' , '#home');
    window.addEventListener('haschange' , app.poppin)
  },
  nav: function(ev){
    ev.preventDefault();
    let currentPage = ev.target.getAttribute('data-target');
    document.querySelector('.active').classList.remove('active');
    document.getElementById(currentPage).classList.add('active');
    history.pushState({},currentPage, '#${currentPage}');
    document.getElementById(currentPage).dispatchEvent(app.show);
  },
  pageShown: function(ev){
    ev.target

  },
  poppin: function(ev){
      console.log(location.hash,'popstate event');
  }
}

document.addEventListener('DOMContentLoaded', app.init);
