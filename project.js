
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

jQuery(document).ready(function(){
    $("#fighterForm").submit(function(e){

      e.preventDefault(); // prevents refreshing the page !

      var inputs = $(this).serialize();
     $.post("myinsert.php",inputs,function(){
          $('.content1').load('admin.php');
      });

    });
});

jQuery(document).ready(function(){
    $("#eventForm").submit(function(e){

      e.preventDefault(); // prevents refreshing the page !

      var inputs = $(this).serialize();
     $.post("eventInsert.php",inputs,function(){
          $('.event').load('home.php');
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
    window.addEventListener('popstate' , app.poppin)
  },
  nav: function(ev){
    ev.preventDefault();
    let currentPage = ev.target.getAttribute('data-target');
    document.querySelector('.active').classList.remove('active');
    document.getElementById(currentPage).classList.add('active');
  //  console.log(currentPage);
    history.pushState({},currentPage, `#${currentPage}`);
    document.getElementById(currentPage).dispatchEvent(app.show);
  },
  pageShown: function(ev){
  //  ev.target
  //console.log('Page ' , ev.target.id , 'just show');

  },
  poppin: function(ev){
    //  console.log(location.hash,'popstate event');
      let hash = location.hash.replace('#' , '');
      document.querySelector('.active').classList.remove('active');
      document.getElementById(hash).classList.add('active');
    //  console.log(currentPage);
    //  history.pushState({},currentPage, `#${currentPage}`);
      document.getElementById(hash).dispatchEvent(app.show);

  }
}

document.addEventListener('DOMContentLoaded', app.init);
