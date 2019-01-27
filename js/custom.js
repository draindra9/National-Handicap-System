function htmlbodyHeightUpdate()
{
	var height3 = $(window).height()
	var height1 = $('.nav').height()+50
	height2 = $('.main').height()

	if(height2 > height3)
	{
  	$('html').height(Math.max(height1,height3,height2)+10);
		$('body').height(Math.max(height1,height3,height2)+10);
	}
	else
	{
		$('html').height(Math.max(height1,height3,height2));
		$('body').height(Math.max(height1,height3,height2));
	}
}

$(document).ready(function(){
	htmlbodyHeightUpdate()
	$(window).resize(function(){
		htmlbodyHeightUpdate()
	});
	$(window).scroll(function(){
		height2 = $('.main').height()
		htmlbodyHeightUpdate()
	});
});

$(document).ready(function(){
	$('#toggle').click(function(){
    $('#jumbotron').slideToggle('slow');
    $('#toggle').toggleClass('active');

		var img = $('#toggle').find('img');
	
		if( img.attr('alt') == 'collapse')
		{
	    img.attr('alt','down');
			img.attr('src','images/expand22.png');
		}
		else
		{
			img.attr('alt','collapse');
			img.attr('src','images/collapse3.png');
		}
		return false;
  });
});

function setModalMaxHeight(element)
{
  this.$element     = $(element);  
  this.$content     = this.$element.find('.modal-content');
  var borderWidth   = this.$content.outerHeight() - this.$content.innerHeight();
  var dialogMargin  = $(window).width() < 768 ? 20 : 60;
  var contentHeight = $(window).height() - (dialogMargin + borderWidth);
  var headerHeight  = this.$element.find('.modal-header').outerHeight() || 0;
  var footerHeight  = this.$element.find('.modal-footer').outerHeight() || 0;
  var maxHeight     = contentHeight - (headerHeight + footerHeight);

  this.$content.css({
      'overflow': 'hidden'
  });
  
  this.$element
    .find('.modal-body').css({
      'max-height': maxHeight,
      'overflow-y': 'auto'
  });
}

$('.modal').on('show.bs.modal', function(){
  $(this).show();
  setModalMaxHeight(this);
});

$(window).resize(function(){
  if ($('.modal.in').length != 0) {
    setModalMaxHeight($('.modal.in'));
  }
});