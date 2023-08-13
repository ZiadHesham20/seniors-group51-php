

$(document).ready(function(){
    $('.loadingScreen').fadeOut(1000);


    $('.colors span').eq(0).css("backgroundColor","orange");
    $('.colors span').eq(1).css("backgroundColor","blue");
    $('.colors span').eq(2).css("backgroundColor","var(--mycolor)");
    $('.colors span').eq(3).css("backgroundColor","#D9CB50");
    $('.colors span').eq(4).css("backgroundColor","green");

    let divwidth = $('.colorbox').width();

    $('.fa-gear').click(function(){
        if( $('.colorbox').css('left') == '0px'){
            $('.colorbox').animate({'left': -divwidth},1000)
        }
        else{
            $('.colorbox').animate({'left': '0px'},1000)
        }
       
    })
  
$('.p2button').click(function(){
   $('.changeable').animate({height:'+=150px'},()=>{
    $(this).fadeOut(200,function(){
        $('.phide').fadeIn(500)
    })
   })
});



$(window).scroll(function(){
    if( $(window).scrollTop() > ($(".aboutUs").offset().top - $('nav').innerHeight())){

        $('nav').css("backgroundColor","black");
        $('.tasty').css("color","white")
        $('.final').fadeIn(500);
    }
    else{
        $('nav').css("backgroundColor","white");
        $('.tasty').css("color","black");
        $('.final').fadeOut(500);
    } 
})
})

$('.socialiconface').mouseenter(function(){
    $('.socialiconface').css('border' , `2px solid #E84545`)
    $('.socialiconface').css('color' ,'#E84545')
  })
  $('.socialiconface').mouseleave(function(){
    $('.socialiconface').css('border' , '2px solid gray')
    $('.socialiconface').css('color' , 'gray')
  })
  $('.socialiconinsta').mouseenter(function(){
    $('.socialiconinsta').css('border' , `2px solid #E84545`)
    $('.socialiconinsta').css('color' , '#E84545')
  })
  $('.socialiconinsta').mouseleave(function(){
    $('.socialiconinsta').css('border' , '2px solid gray')
    $('.socialiconinsta').css('color' , 'gray')
  })
  $('.socialicontweet').mouseenter(function(){
    $('.socialicontweet').css('border' , `2px solid #E84545`)
    $('.socialicontweet').css('color' , '#E84545')
  })
  $('.socialicontweet').mouseleave(function(){
    $('.socialicontweet').css('border' , '2px solid gray')
    $('.socialicontweet').css('color' , 'gray')
  })
  $('.socialiconlinked').mouseenter(function(){
    $('.socialiconlinked').css('border' , `2px solid #E84545`)
    $('.socialiconlinked').css('color' , '#E84545')
  })
  $('.socialiconlinked').mouseleave(function(){
    $('.socialiconlinked').css('border' , '2px solid gray')
    $('.socialiconlinked').css('color' , 'gray')
  })


$('.colors span').click(function(){
    let bg = $(this).css("backgroundColor");
    $('.selected').css('color', bg );
    $('.selected2').css('backgroundColor', bg );
    $('.selected3').css('color', 'black' );
    $('.svgcolorchange').css('fill', bg);
    $('.socialiconface').mouseenter(function(){
        $('.socialiconface').css('border' , `2px solid ${bg}`)
        $('.socialiconface').css('color' , bg)
      })
      $('.socialiconface').mouseleave(function(){
        $('.socialiconface').css('border' , '2px solid gray')
        $('.socialiconface').css('color' , 'gray')
      })
      $('.socialiconinsta').mouseenter(function(){
        $('.socialiconinsta').css('border' , `2px solid ${bg}`)
        $('.socialiconinsta').css('color' , bg)
      })
      $('.socialiconinsta').mouseleave(function(){
        $('.socialiconinsta').css('border' , '2px solid gray')
        $('.socialiconinsta').css('color' , 'gray')
      })
      $('.socialicontweet').mouseenter(function(){
        $('.socialicontweet').css('border' , `2px solid ${bg}`)
        $('.socialicontweet').css('color' , bg)
      })
      $('.socialicontweet').mouseleave(function(){
        $('.socialicontweet').css('border' , '2px solid gray')
        $('.socialicontweet').css('color' , 'gray')
      })
      $('.socialiconlinked').mouseenter(function(){
        $('.socialiconlinked').css('border' , `2px solid ${bg}`)
        $('.socialiconlinked').css('color' , bg)
      })
      $('.socialiconlinked').mouseleave(function(){
        $('.socialiconlinked').css('border' , '2px solid gray')
        $('.socialiconlinked').css('color' , 'gray')
      })
      $('.happy').css("backgroundColor",bg)

      
      

})

$('.title').append('<div class="happy"></div>');

