$(document).ready(function() {
    setInterval(function(){
        //move the last list item before the first item. The purpose of this is if the user clicks previous he will be able to see the last item.  
        $('#galerie_ul li:first').before($('#galerie_ul li:last'));

        //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
        var item_width = $('#galerie_ul li').outerWidth() + 10;

        /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
        var left_indent = parseInt($('#galerie_ul').css('left')) + item_width;

        $('#galerie_ul').animate({'left' : left_indent}, {queue:false, duration:500}, function(){
            /* when sliding to left we are moving the last item before the first item */
            $('#galerie_ul li:first').before($('#galerie_ul li:last'));

            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
            $('#galerie_ul').css({'left' : '-210px'});
        });

    },800);
  });