jQuery(document).ready(function ($) {

    $('#checkbox').change(function(){
      setInterval(function () {
          moveRight();
      }, 3000);
    });
    
      var slideCount = $('#slider ul li').length;
      var slideWidth = $('#slider ul li').width();
      var slideHeight = $('#slider ul li').height();
      var sliderUlWidth = slideCount * slideWidth;
      
      $('#slider').css({ width: slideWidth, height: slideHeight });
      
      $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
      
      $('#slider ul li:last-child').prependTo('#slider ul');
  
      function moveLeft() {
          $('#slider ul').animate({
              left: + slideWidth
          }, 200, function () {
              $('#slider ul li:last-child').prependTo('#slider ul');
              $('#slider ul').css('left', '');
          });
      };
  
      function moveRight() {
          $('#slider ul').animate({
              left: - slideWidth
          }, 200, function () {
              $('#slider ul li:first-child').appendTo('#slider ul');
              $('#slider ul').css('left', '');
          });
      };
  
      $('a.control_prev').click(function () {
          moveLeft();
      });
  
      $('a.control_next').click(function () {
          moveRight();
      });
  
  });

/////////BUTTON LOADMORE///////////////////////////////

jQuery(function($){ 
	$('.loadmore').click(function(){
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : loadmore_params.current_page
		};

        
        
		$.ajax({ // you can also use $.post here 
			url : loadmore_params.root + loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',

			beforeSend : function ( xhr ) {
                xhr.setRequestHeader('X-WP-Nonce', loadmore_params.nonce);
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){ 
                console.log(data);
				if( data ) { 
					button.text( 'Charger plus d\'articles' ).prev().before(data); // insert new posts
                    
					loadmore_params.current_page++;
 
					if ( loadmore_params.current_page == loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
				} 
			}
		});
	});
});


/////SEARCH 

// function expand() {
//     $(".search").toggleClass("close");
//     $(".input_search").toggleClass("square");
//     if ($('.search').hasClass('close')) {
//       $('input').focus();
//     } else {
//       $('input').blur();
//     }
//   }
//   $('button').on('click', expand);