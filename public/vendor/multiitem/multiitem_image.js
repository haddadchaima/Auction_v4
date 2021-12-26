"use strict";
(function($){
    // options
    $.fn.multiitems = function(options) {
        options = $.extend({
            template : '',
            removeButton : '<a href="javascript:;" class="btn btn-danger remove-item"><i class="fa fa-minus"></i></a>',
            addButton : '<a href="javascript:;" class="btn btn-info add-item mt-4" style="display: none"><i class="fa fa-plus"></i> Add New Field</a>',
            moveButton : '<div class="move-place"><a class="move-up btn btn-danger" href="javascript:;"><i class="fa  fa-caret-up"></i></a><a class="move-down btn btn-danger" href="javascript:;"><i class="fa fa-caret-down"></i></a></div>',
            removeButtonClass : 'remove-item',
            addButtonClass : 'add-item',
            moveUpButtonClass : 'move-up',
            moveDownButtonClass : 'move-down',
            inverse : false,
            sortable: false,
            insertable: true,
            removable: true,
            max: 0,
            delay: 0
        }, options);

        var multiItems = this;
        multiItems.each(function(){
            var $this = $(this);
            var sortable = options.sortable ? options.moveButton :  '';
            var singleItem = '<div class="col-lg-4"><div class="single-element clearfix">' + options.template + options.removeButton + sortable + '</div></div>'
            if(options.insertable){
                if(!options.inverse){
                    $this.append(options.addButton);
                }
                else{
                    $this.prepend(options.addButton);
                }
                if((options.max > 0 && multiItems.find('.single-element').length < options.max) || options.max <= 0){
                    $this.children('.'+options.addButtonClass).show();
                }
            }
            $this.children('.'+options.addButtonClass).on('click',function(){
                if(options.delay==0 && options.insertable){
                    var count = multiItems.find('.single-element').length;
                    if((options.max > 0 &&  count < options.max) || options.max <= 0){
                        if(!options.inverse) {
                            $(this).before(singleItem);
                        }
                        else{
                            $(this).after(singleItem);
                        }
                        rearrangeField();
                    }
                    if((options.max > 0 && multiItems.find('.single-element').length >= options.max)){
                        $(this).hide();
                    }
                }
            })
        });
        $(document).on('click','.'+options.removeButtonClass, function(){
            if(options.delay==0 && options.removable) {
                $(this).closest('.multi-element').append($(this).parent().find('ul.select-dropdown'));
                if ((options.max > 0 && ($(this).closest('.multi-element').find('.single-element').length - 1) < (options.max)) || options.max <= 0) {
                    $(this).closest('.multi-element').find('.' + options.addButtonClass).show();
                }
                $(this).parent().remove();
                rearrangeField();
            }
        })

        $(document).on('click','.'+options.moveUpButtonClass, function(){
            if(options.delay==0 && options.sortable) {
                var prevItem = $(this).closest('.single-element').prev('.single-element');
                if (prevItem.length > 0) {
                    $(this).closest('.single-element').addClass('moveup');
                    delayedAlert();
                    prevItem.addClass('movedown').before($(this).closest('.single-element'))
                    rearrangeField();
                }
            }
        })
        $(document).on('click','.'+options.moveDownButtonClass, function(){
            if(options.delay==0 && options.sortable) {
                var nextItem = $(this).closest('.single-element').next('.single-element');
                if (nextItem.length > 0) {
                    $(this).closest('.single-element').addClass('movedown');
                    delayedAlert();
                    nextItem.addClass('moveup').after($(this).closest('.single-element'))
                    rearrangeField();
                }
            }
        })


        $(document).on('click','p.single-unit', function(e){
            if(options.delay==0) {
                e.stopPropagation();
                $('ul.select-dropdown').hide();
                if ($(this).data('id')) {
                    $(this).parent().append($('#' + $(this).data('id')))
                    $('#' + $(this).data('id')).show();
                }
            }
        })
        $(document).on('click','ul.select-dropdown li', function(e){
            if(options.delay==0) {
                e.stopPropagation();
                $(this).parent().siblings('input').val($(this).children('input').val());
                $(this).parent().siblings('p').html($(this).children('span').html());
                $(this).parent().hide();
            }
        })
        $(document).on('click','body', function(){
            if(options.delay==0) {
                $('ul.select-dropdown').hide();
            }
        })

        function rearrangeField(){
            var items = multiItems.find('.single-element');
            // var serial = 0;
            items.each(function(){
                var $this = $(this);
                $this.find('.multi-input').each(function(){
                    console.log($(this).data('key'));
                    var name = $(this).data('key') || $(this).data('key')=='0' ? '[' + $(this).data('key') + ']' : '[]';
                    name = multiItems.data('input') + name;
                    $(this).attr('name', name);
                })
                serial++;
            })
        }

        function delayedAlert() {
            options.delay=1;
            console.log(options.delay);
            window.setTimeout(function(){
                $('.single-element').removeClass('movedown').removeClass('moveup');
                options.delay=0;
            }, 400);
        }
    }
})(jQuery);
