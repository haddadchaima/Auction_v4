function elementAction(id, formSubmit) {
    var elem = document.getElementById(id);
    if (elem) {
        if (formSubmit == 'y') {
            document.getElementById(id).submit();
        } else {
            return elem.parentNode.removeChild(elem);
        }
    }
}

function closeMethod() {
    elementAction($('.flash-message').find('.flash-confirm').attr('data-form-auto-id'))
    $('.flash-message').removeClass('flash-message-active').remove('flash-message-window');
    $('.flash-message').find('.flash-confirm').attr('href', 'javascript:;').removeAttr('data-form-id').removeAttr('data-form-auto-id');
    $('.flash-message')
        .find('.centralize-content')
        .removeClass('flash-success')
        .removeClass('flash-error')
        .removeClass('flash-warning')
        .removeClass('flash-confirmation')
        .find('p')
        .text('');
}

function flashBox(warnType, message) {
    $('.flash-message').find('.centralize-content').addClass('flash-' + warnType).find('p').text(message);
    $('.flash-message').addClass('flash-message-active flash-message-window');
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

$(document).on('click', '.flash-close', function (e) {
    e.preventDefault();
    closeMethod();
});

$(document).on('click', '.flash-message-window', function (e) {
    e.preventDefault();
    closeMethod();
});

$(document).on('click', '.flash-confirm', function (e) {
    var $this = $(this);
    var dataInfo = $this.attr('data-form-id');
    var autoForm = $this.attr('data-form-auto-id');
    if (autoForm) {
        e.preventDefault();
        elementAction(autoForm, 'y');
        closeMethod();
    } else if (dataInfo) {
        e.preventDefault();
        $('#' + dataInfo).submit();
        closeMethod();
    }
});

$(document).on('click', '.confirmation', function (e) {
    e.preventDefault();
    var $this = $(this);
    var dataAlert = $this.attr('data-alert');
    dataInfo = $this.attr('data-form-id');
    if (!dataInfo) {
        var dataInfo = $this.attr('href');
        $('.flash-message').find('.flash-confirm').attr('href', dataInfo);
    } else {
        var autoForm = $this.attr('data-form-method');
        if (autoForm) {
            var link = $this.attr('href')
            var dataToken = $('meta[name="csrf-token"]').attr('content');
            autoForm = autoForm.toUpperCase();
            if (autoForm == 'POST' || autoForm == 'PUT' || autoForm == 'DELETE') {
                var newForm = '<form id="#auto-form-generation-' + dataInfo + '" method="POST" action= "' + link + '" style="height: 0; width: 0; overflow: hidden;">'; //
                newForm = newForm + '<input type = "hidden" name ="_token" value = "' + dataToken + '">';
                newForm = newForm + '<input type = "hidden" name ="_method" value = "' + autoForm + '">';
                $('body').prepend(newForm);
            }
            $('.flash-confirm').attr('data-form-auto-id', '#auto-form-generation-' + dataInfo);
        } else {
            $('.flash-message').find('.flash-confirm').attr('data-form-id', dataInfo);
        }
    }
    $('.flash-message').find('.centralize-content').addClass('flash-confirmation').find('p').text(dataAlert);
    $('.flash-message').addClass('flash-message-active');
});

$('.nav-sidebar').find('.active').closest('.nav-treeview').show().parent().addClass('menu-open');


var backMenu = $('.nav-sidebar').find('li');
for(var i = backMenu.length-1; i>=0; i--){
    var $this = $(backMenu[i]);
    var hrefData = $this.children('a').attr('href');
    if (!hrefData || hrefData == '' || hrefData.toLowerCase() == 'javascript:;') {
        if ($this.find('li').length <= 0) {
            $this.remove();
        }
    }

    var dropdown = $this.children('ul');
    if(dropdown.length>0){
        if($this.parent().hasClass('nav')){
            $this.addClass('has-treeview');
        }
    }
}
$('.nav-sidebar').find('.active').parent().parents('.nav-item.has-treeview').addClass('menu-open')


$(window).on("load",function(){
    $("#mScroll").mCustomScrollbar({
        theme:"dark",
        scrollInertia: 300,
        axis: 'y'
    });
});

//iCheck for checkbox and radio inputs
if ($('input.minimal').length > 0) {
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
}

//Flat red color scheme for iCheck
if ($('input.flat-red').length > 0) {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
}

if ($('input.flat-blue').length > 0) {
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
}

if ($('input.flat-green').length > 0) {
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
}

function stripTag(input) {
    input = input.toString();
    return input.replace(/(<([^>]+)>)/ig,"");
}

