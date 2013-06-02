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
  
})

var thumbViewerObject = function(id) {
  
  thumbViewer = {
    viewer : id,
    thumbsPerPage : 12,
    showingPage : 1,
    pageWidth : 400,
    numberPages : 0,



    init : function(){

      var that = this;

      var hammertime = $(this.viewer).hammer({
        drag : false,
        transform : false,
        drag_block_vertial : true
      });
   
      // hammertime.on("touchmove", function(ev) {
      //   ev.preventDefault();
      // });

      hammertime.on("release", function(ev) {
           
           var direction = ev.gesture.direction;
           
           if (direction == "right" && that.showingPage > 1) {
              that.showingPage--;
              that.gotoPage(that.showingPage,"slide");
            }      
      
            if(direction == "left" && that.showingPage < that.numberPages){
              that.showingPage++;
              that.gotoPage(that.showingPage,"slide");
            }
      
        });


         

      fillingPage = 0;
      thumbNumber = 0; 

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
          $(this).addClass("Same");
          that.showingPage = fillingPage;
          that.gotoPage(fillingPage, "jump");
        }

        
        $(".PostLink").on("dragstart",function(e){
          e.preventDefault();
        });


      });
      
      $(this.viewer + " .ThumbNav a").click(function() {
         if ($(this).attr("id") == "next") {
            that.showingPage++;
            that.gotoPage(that.showingPage,"slide");
         } else {
            that.showingPage--;
            that.gotoPage(that.showingPage,"slide");
         }
         return false;

       });
       
       that.hideNav();
       this.numberPages = $(".Page").size();
   
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
    },
    
    gotoPage : function (page,style) {

      gotoPosition = -1 * ((page-1) * this.pageWidth);
      
         if (style == "jump") {
          $('.PostThumbnails').css("left", gotoPosition);
        } else {
          $('.PostThumbnails').css("left", gotoPosition);
          
          // $(".PostThumbnails").animate({left: gotoPosition}, 350, function() {});
       }
      this.hideNav();
    }
    
    }
    
    return thumbViewer; 
    
  }