$(document).ready(function() {
  thumbViewer1 = new thumbViewerObject(".PostThumbnailsWrapper");
  thumbViewer1.init();

    $(".zoom").fancybox({
      "fitToView" : false
    });

     $(".tictac").fancybox({
       "fitToView" : false,
       'width' : 720,
       'height': 480
     });

     $(".pop_slingshot").fancybox({
        "fitToView" : false,
        "width"  : 400,
        "height" : 840
     });

     $(window).scroll(function(){
       var scroll = $(this).scrollTop();
       $.cookie("scroll", scroll, {expires : 7 , path : '/'});
       rotateHeader(scroll);
     
     
     });
  
     var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/); 
     
     if(!isMobile){
       if($.cookie("scroll")) {
        $(window).scrollTop($.cookie("scroll")); 
       };
       rotateHeader($.cookie("scroll"));
     }
  
  
  
})

function rotateHeader(scroll){
  var percent = scroll/260;
  var opacity = 1 - percent;  
  $("#header h1").css("opacity",opacity);
}


var thumbViewerObject = function(id) {
  
  thumbViewer = {
    viewer : id,
    thumbsPerPage : 12,
    showingPage : 1,
    pageWidth : 400,
    numberPages : 0,

    init : function(){
         
      var fillingPage = 0;
      var thumbNumber = 0; 

      var that = this;

      $(this.viewer + " .PostLink").each(function(post){

        thumbNumber++;
        
        fillingPage = Math.ceil(thumbNumber/that.thumbsPerPage);

        //If there's no page div created for it, make one
        if ($("#page_" + fillingPage).length == 0) {
          var page  = document.createElement("div");
          $(page).attr("id" , "page_" + fillingPage).addClass("Page");
          $(".PostThumbnails").append(page);
        }
 
       //Append link and img into the page div
        $("#page_" + fillingPage).append($(this));

         //Adds a class if this is the post being shown
         //currentPostID is set via PHP on the thumbnails.php file
         //Goes to the page with the currently viewed post
         
        if ($(this).attr("post_id") == currentPostID) {
          console.log(currentPostID);
          
          $(this).addClass("Same");
          that.showingPage = fillingPage;
          that.gotoPage(fillingPage, "jump");
        }
        
        $(".PostLink").on("dragstart",function(e){
          e.preventDefault();
        });
      });

      // Page Toggle Actions

      var hammertime = $(this.viewer).find(".PostThumbnails").hammer({
        drag : false,
        transform : false,
        drag_block_vertial : true
      });

       hammertime.on("release", function(ev) {
        
          if (ev.gesture.distance > 10) {
            var direction = ev.gesture.direction;

            if (direction == "right" && that.showingPage > 1) {
              that.showingPage--;
              that.gotoPage(that.showingPage,"slide");
            }      

            if(direction == "left" && that.showingPage < that.numberPages){
              that.showingPage++;
              that.gotoPage(that.showingPage,"slide");
            }
          }
        
      
            return false;

           });

      $(this.viewer).on("click",".ThumbNav a", function() {

         if ($(this).attr("id") == "next") {
           that.showingPage++;
           that.gotoPage(that.showingPage,"slide");
         } else {
            that.showingPage--;
            that.gotoPage(that.showingPage,"slide");
         }

         return false;

       });
       
       that.numberPages = $(".Page").size();
       that.hideNav();


   
    },
    gotoPage : function (page,style) {
      
      $('.PostThumbnails').removeClass("SlideMe");
      
      if(style == "slide"){
        $('.PostThumbnails').addClass("SlideMe");
      }

      var gotoPosition = -1 * ((page-1) * this.pageWidth);
      $('.PostThumbnails').css("left", gotoPosition);
      this.hideNav();
      
    },
    //Shows appropriate next / previous buttons
    hideNav : function() {
      
      $("#previous").show();
      $("#next").show();
      
      if (this.showingPage == 1) {
        $("#previous").hide();
      }
      
      if (this.showingPage == this.numberPages) {
        $("#next").hide();
      }
    }
    
    }
    
    return thumbViewer; 
    
  }