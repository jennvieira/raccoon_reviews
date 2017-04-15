(function (){

// "use strict";
console.log("Seaf fired2");

var sub_but = document.querySelector('#review_submit');
sub_but.addEventListener("click", prevDef, false);
sub_but.addEventListener("click", postReview, false);


function prevDef(e){
  e.preventDefault();
}


function postReview()
{
  var review = document.querySelector("#review_review").value;
  var name = document.querySelector("#review_name").value;
  var title = document.querySelector(".mov_title").innerHTML;
  console.log(title);
  if(review && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'phpscripts/comments.php',
      data:
      {
        user_review:review,
	       user_name:name,
         movie_title:title
      },
      success: function (response)
      {
	    document.querySelector("#reviews_box").innerHTML=response+document.querySelector("#reviews_box").innerHTML;
	    document.querySelector("#review_review").value="";
      document.querySelector("#review_name").value="";

      }
    });
  }

  return false;
}

  })();
