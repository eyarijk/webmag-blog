(function($) {
	"use strict"

	// Fixed Nav
	var lastScrollTop = 0;
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();
		if ( wScroll > $('#nav').height() ) {
			if ( wScroll < lastScrollTop ) {
				$('#nav-fixed').removeClass('slide-up').addClass('slide-down');
			} else {
				$('#nav-fixed').removeClass('slide-down').addClass('slide-up');
			}
		}
		lastScrollTop = wScroll
	});

	// Search Nav
	$('.search-btn').on('click', function () {
		$('.search-form').addClass('active');
	});

	$('.search-close').on('click', function () {
		$('.search-form').removeClass('active');
	});

	// Aside Nav
	$(document).click(function(event) {
		if (!$(event.target).closest($('#nav-aside')).length) {
			if ( $('#nav-aside').hasClass('active') ) {
				$('#nav-aside').removeClass('active');
				$('#nav').removeClass('shadow-active');
			} else {
				if ($(event.target).closest('.aside-btn').length) {
					$('#nav-aside').addClass('active');
					$('#nav').addClass('shadow-active');
				}
			}
		}
	});

	$('.nav-aside-close').on('click', function () {
		$('#nav-aside').removeClass('active');
		$('#nav').removeClass('shadow-active');
	});

	// Sticky Shares
	var $shares = $('.sticky-container .sticky-shares'),
	$sharesHeight = $shares.height(),
	$sharesTop,
	$sharesCon = $('.sticky-container'),
	$sharesConTop,
	$sharesConleft,
	$sharesConHeight,
	$sharesConBottom,
	$offsetTop = 80;

	function setStickyPos () {
		if ($shares.length > 0) {
			$sharesTop = $shares.offset().top
			$sharesConTop = $sharesCon.offset().top;
			$sharesConleft = $sharesCon.offset().left;
			$sharesConHeight = $sharesCon.height();
			$sharesConBottom = $sharesConHeight + $sharesConTop;
		}
	}

	function stickyShares (wScroll) {
		if ($shares.length > 0) {
			if ( $sharesConBottom - $sharesHeight - $offsetTop < wScroll ) {
				$shares.css({ position: 'absolute', top: $sharesConHeight - $sharesHeight , left:0});
			} else if ( $sharesTop < wScroll + $offsetTop ) {
				$shares.css({ position: 'fixed', top: $offsetTop, left: $sharesConleft });
			} else {
				$shares.css({position: 'absolute', top: 0, left: 0});
			}
		}
	}

	$(window).on('scroll', function() {
		stickyShares($(this).scrollTop());
	});

	$(window).resize(function() {
		setStickyPos();
		stickyShares($(this).scrollTop());
	});

	setStickyPos();

})(jQuery);

$('.moreButton').on('click',function () {
	let $this = $(this),
		page = $this.data('page'),
		action = $this.data('action'),
		append = $this.data('append'),
        countMore = $this.find('.countMore'),
		moreBlock = $this.closest('.moreBlock')
	;

	let requestData = {
		page: page + 1
	};

    $.ajax({url: action, data:requestData, success: result => {

		$(append).append(result.view);
		countMore.text(`(${result.count})`);

		if (result.hideButton === true) {
            moreBlock.remove();
		}
		$this.data('page',page + 1);
	}});
});

$('.comment-reply').on('click',function () {
	let $this = $(this),
		parentId = $this.data('id'),
        mediaBody = $this.closest('.media-body'),
		commentText = mediaBody.find('.comment-text').text(),
		replyBlock = $('.reply-block'),
		userName = mediaBody.find('.comment-user').text()
	;

	replyBlock.find('.panel-body').text(commentText);
	replyBlock.find('.reply-user').text(userName);
	replyBlock.removeClass('hidden');
    $('#article_comment_parentCommentId').val(parentId);

    $('html,body').animate({
		scrollTop: replyBlock.offset().top,
	},1000);
});

$('.close-reply').on('click',function () {
	let replyBlock = $('.reply-block');

    replyBlock.addClass('hidden');
    replyBlock.find('.panel-body').text('');
    replyBlock.find('.reply-user').text('');
    $('#article_comment_parentCommentId').val(null);
});

$('.likes-block .action-btn').on('click',function () {
	let $this = $(this),
		likesBlock = $this.closest('.likes-block'),
		isLike = Number($this.data('like')),
		action = likesBlock.data('action')
	;

    $.ajax({url: action, data: {isLike: isLike}, success: result => {
		likesBlock.find('.like-count').text(result.likes);
		likesBlock.find('.dislike-count').text(result.dislikes);
	}});

});
