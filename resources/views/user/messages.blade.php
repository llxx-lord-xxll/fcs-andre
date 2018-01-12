
@extends('user.index')

@section('title')
    Messages -
@endsection

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/apps/messenger.min.css')}}">
@endsection

@section('page')

    <div class="ks-column ks-page">
        <div class="ks-header">
            <section class="ks-title">
                <h3>Messenger</h3>
                <button class="btn btn-primary-outline ks-light ks-messenger-info-block-toggle" data-block-toggle=".ks-messenger > .ks-info">Info</button>
            </section>
        </div>

        <div class="ks-content">
            <div class="ks-body">
                <div class="ks-messenger">
                    <div class="ks-discussions">
                        <div class="ks-search">
                            <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                <input id="input-group-icon-text" type="text" class="form-control" placeholder="Search">
                                <span class="icon-addon">
                <span class="la la-search"></span>
            </span>
                            </div>
                        </div>
                        <div class="ks-body ks-scrollable" data-auto-height>
                            <ul class="ks-items">



                            </ul>
                        </div>
                    </div>

                    <div class="ks-messages">
                        <div class="ks-header">
                            <div class="ks-description">
                                <div class="ks-name"></div>
                                <div class="ks-amount"></div>
                            </div>
                            <div class="ks-controls">
                                <div class="dropdown">
                                    <button class="btn btn-primary-outline ks-light ks-no-text ks-no-arrow" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="la la-ellipsis-h ks-icon"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right ks-simple" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">
                                            <span class="la la-user-plus ks-icon"></span>
                                            <span class="ks-text">Add members</span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="la la-eye-slash ks-icon"></span>
                                            <span class="ks-text">Mark as unread</span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="la la-bell-slash-o ks-icon"></span>
                                            <span class="ks-text">Mute notifications</span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="la la-mail-forward ks-icon"></span>
                                            <span class="ks-text">Forward</span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="la la-ban ks-icon"></span>
                                            <span class="ks-text">Spam</span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="la la-trash-o ks-icon"></span>
                                            <span class="ks-text">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ks-body ks-scrollable" data-auto-height data-reduce-height=".ks-footer" data-fix-height="32">
                            <ul class="ks-items">

                            </ul>
                        </div>
                        <div class="ks-footer">
                            <textarea class="form-control" placeholder="Type something..."></textarea>
                            <div class="ks-controls">
                                <button class="btn btn-primary">Send</button>
                                <div class="dropdown dropup">
                                    <button class="btn btn-link ks-smile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="la la-smile-o"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right ks-scrollable ks-smileys" aria-labelledby="dropdownMenuButton">
                                        <div class="ks-smileys-wrapper">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/angel.png') }}" data-content="(angel)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/angry-2.png') }}" data-content="(angry-2)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/angry-3.png') }}" data-content="(angry-3)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/baby-1.png') }}" width="20" data-content="(baby-1)" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/confused-3.png') }}" data-content="(confused-3)" width="20" height="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/creepy.png') }}"  data-content="(creepy)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/crying-3.png') }}" data-content="(crying-3)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/dazed-2.png') }}"  data-content="(dazed-2)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/dead-4.png') }}"  data-content="(dead-4)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/desperate-1.png') }}"  data-content="(desperate-1)" width="20" height="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/doctor.png') }}"  data-content="(doctor)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/dumb.png') }}" data-content="(dumb)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/gentleman-3.png') }}" data-content="(gentleman-3)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/gentleman-4.png') }}" data-content="(gentleman-4)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/goofy-1.png') }}" data-content="(goofy-1)"  width="20" height="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/goofy-4.png') }}" data-content="(goofy-4)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-1.png') }}" data-content="(happy-1)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-5.png') }}" data-content="(happy-5)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-6.png') }}" data-content="(happy-6)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-7.png') }}"  data-content="(happy-7)" width="20" height="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-8.png') }}"  data-content="(happy-8)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-9.png') }}" data-content="(happy-9)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-10.png') }}" data-content="(happy-10)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/happy-11.png') }}"  data-content="(happy-11)" width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/hipster-2.png') }}" data-content="(hipster-2)"  width="20" height="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/in-love-2.png') }}" data-content="(love-2)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/in-love-3.png') }}" data-content="(love-3)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/in-love-4.png') }}" data-content="(love-4)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/joyful-2.png') }}" data-content="(joyful-2)"  width="20" height="20">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('user/assets/img/smiley/kiss-1.png') }}" data-content="(kiss-1)"  width="20" height="20">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="ks-info">
                        <div class="ks-header">
                            Conversation Info
                        </div>
                        <div class="ks-body">
                            <div class="ks-list">
                                <div class="ks-header">
                                    <span class="ks-text">Members</span>
                                    <span class="ks-amount">3</span>
                                </div>
                                <div class="ks-items">

                                </div>
                            </div>

                        </div>
                        <div class="ks-footer">
                            <div class="ks-item">
                                <div class="ks-name">Started</div>
                                <div class="ks-text">

                                </div>
                            </div>
                            <div class="ks-item">
                                <div class="ks-name">Last Activity</div>
                                <div class="ks-text">
                                    1 minute ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/caret/1.0.0/jquery.caret.js"></script>
    <script type="application/javascript">
        var jsonObj;
        var cid;
        var cmsg;
        var timer
        var smileys = ["(angel)",
            "(angry-2)",
            "(angry-3)" ,
            "(baby-1)",
            "(confused-3)",
            "(creepy)",
            "(crying-3)",
            "(dazed-2)",
            "(dead-4)",
            "(desperate-1)",
            "(doctor)",
            "(dumb)",
            "(gentleman-3)",
            "(gentleman-4)",
            "(goofy-1)",
            "(goofy-4)",
            "(happy-1)",
            "(happy-5)",
            "(happy-6)",
            "(happy-7)",
            "(happy-8)",
            "(happy-9)",
            "(happy-10)",
            "(happy-11)",
            "(hipster-2)",
            "(love-2)",
            "(love-3)",
            "(love-4)",
            "(joyful-2)",
            "(kiss-1)"];
        //Get Conversations
        var get_conversations = function () {
            $.post( window.location.href.split('messages')[0] + "messages/get_conversations", {"page":"1"}).done(function (data) {


                if(jsonObj===jQuery.parseJSON(data))
                {
                    console.log('test');
                    //setTimeout(get_conversations(),1000);
                    return ;
                }
                console.log(jsonObj);
                console.log(jQuery.parseJSON(data));
                console.log("   ");
                jsonObj = jQuery.parseJSON(data);
                var conCount = jsonObj[0].content;

                $.each(conCount,function (key,data) {
                    $('.ks-discussions .ks-items').append('<li class="ks-item"><a data-content="'+ data[0] +'" href="#'+data[0]+'"> <span class="ks-group-amount">3</span> <div class="ks-body"> <div class="ks-name"> <span class="ks-text">'+ data[1] + '</span> <span class="ks-datetime">'+data[4]+'</span> </div> <div class="ks-message"> '+ data[3]+' </div> </div> </a> </li>');
                });
                if(window.location.hash) {
                    $('.ks-discussions .ks-items>.ks-item a').each(function (key,item) {
                        if($(this).attr('data-content')===window.location.hash.toString().replace("#",""))
                        {
                            $(this).parent().trigger('click');
                        }
                    });
                }
                else {
                    $('.ks-discussions .ks-items>.ks-item').first().trigger('click');
                }
                //setTimeout(get_conversations(),1000);
            }).fail(function (e) {
                //setTimeout(get_conversations(),1000);
                new Noty({
                    text: "Message list could not be retrieved,Please reload",
                    type   : 'error',
                    theme  : 'mint',
                    layout : 'bottomRight',
                    timeout: 2000
                }).show();
            });
        };

        (function ($) {
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                setTimeout( get_conversations(),1000);
                //End of Get Conversations

                //Switch conversations
                $(document).on('click','.ks-discussions .ks-item',function(e){
                    var messagesBox = $('.ks-messages');
                    cid = $(this).find('a').attr('data-content');

                    messagesBox.LoadingOverlay("show", {
                        image: "",
                        custom: $("<div>", {
                            text: 'Loading...'
                        }),
                        color: "rgba(255, 255, 255, 0.6)",
                        zIndex: 2
                    });

                    $.post( window.location.href.split('messages')[0] + "messages/get_dis_info", {"convid":cid}).done(function (data) {
                        cmsg = jQuery.parseJSON(data);
                        cmsg = cmsg[0].content[0];
                        cid = cmsg[0];
                        messagesBox.LoadingOverlay("hide");
                        var ksConvInfo = $('.ks-messenger > .ks-info ');
                        $('.ks-messages>.ks-body .ks-items').first().html("");



                        ksConvInfo.find('.ks-body>.ks-list>.ks-items').html("");

                        $(messagesBox).find('.ks-header>.ks-description>.ks-amount').text(cmsg[4] + (cmsg[4]=="1"?" member":" members"));
                        $(messagesBox).find('.ks-header>.ks-description>.ks-name').text(cmsg[1]);
                        ksConvInfo.find('.ks-footer>.ks-item:nth-child(1) > .ks-text').html(cmsg[3]);
                        ksConvInfo.find('.ks-footer>.ks-item:nth-child(2) > .ks-text').html(cmsg[7]);
                        ksConvInfo.find('.ks-body>.ks-list>.ks-header>.ks-amount').text(cmsg[4] + (cmsg[4]=="1"?" member":" members"));
                        cmsg[5].forEach(function (data,key) {
                            var sender = data['sender'];
                            smileys.forEach(function (value) {
                                data['msg'] =  data['msg'].toString().replace(value,'<img src="{{asset('user/assets/img/smiley/') }}' + '/' + value.replace(")",'').replace("(",'') + '.png" title="'+value+'" width="20" height="20">');
                            });
                            $('.ks-messages>.ks-body .ks-items').append('<li class="ks-item ks-'+(sender['self']?"self":"from")+'"><span class="ks-avatar ks-offline"><img src="'+sender['avatar']+ '" width="36" height="36" class="rounded-circle"></span><div class="ks-body"><div class="ks-header"><span class="ks-name">'+sender['name']+'</span><span class="ks-datetime">'+data['time']+'</span></div><div class="ks-message">'+data['msg']+'</div></div></li>')
                        });

                        cmsg[6].forEach(function (data,key) {
                            if(data['admin'])
                            {
                                ksConvInfo.find('.ks-body>.ks-list>.ks-items').append('<div class="ks-item ks-user"><span class="ks-avatar ks-online"> <a href="'+window.location.href.split('messages')[0] + '+/' + data['username']+'"> <img src="'+ data['avatar']+'" width="36" height="36" class="img-circle"> </a> </span> <span class="ks-owner"> <span class="ks-name">'+data['name']+'</span> <span class="badge badge-success ks-label-sm">Admin</span> </span> </div>');
                            }
                            else
                            {
                                ksConvInfo.find('.ks-body>.ks-list>.ks-items').append('<div class="ks-item ks-user"> <span class="ks-avatar ks-online"> <a href="'+window.location.href.split('messages')[0] + '+/' + data['username']+'"> <img src="'+ data['avatar']+'" width="36" height="36" class="img-circle"> </a></span> <span class="ks-name">'+data['name']+' </span> </div>');
                            }
                        });

                        elem = $(".ks-messages .ks-body").first().jScrollPane();
                        api = elem.data('jsp');
                        api.scrollToY(1000);
                        

                    }).fail(function (e) {
                        messagesBox.LoadingOverlay("hide");
                        new Noty({
                            text: "Message list could not be retrieved,Please reload",
                            type   : 'error',
                            theme  : 'mint',
                            layout : 'bottomRight',
                            timeout: 2000
                        }).show();
                    });

                });
                //End of Switch conversations

                //Send Message
                $(document).on('click','.ks-messages .ks-footer .btn-primary',function () {
                    var txt = $('.ks-messages .ks-footer textarea');
                    var msg = txt.val().trim().replace(/(<([^>]+)>)/ig,"").trim();

                    if(msg === "")
                    {
                        return false;
                    }
                   var p = $.post( window.location.href.split('messages')[0] + "messages/send_message", {"convid":cid,"message":msg}).done(function (data) {
                        $('.ks-messages .ks-footer textarea').val("");
                        jsonObj = jQuery.parseJSON(data);
                       var dt = new Date();
                       var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                       smileys.forEach(function (value) {
                           msg =  msg.toString().replace(value,'<img src="{{asset('user/assets/img/smiley/') }}' + '/' + value.replace(")",'').replace("(",'') + '.png" title="'+value+'" width="20" height="20">');
                       });

                        $('.ks-messages>.ks-body .ks-items').append('<li class="ks-item ks-self"><span class="ks-avatar ks-offline"><img src="{{asset((new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar())}}" width="36" height="36" class="rounded-circle"></span><div class="ks-body"><div class="ks-header"><span class="ks-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span><span class="ks-datetime">'+time+'</span></div><div class="ks-message">'+msg+'</div></div></li>')

                    }).fail(function (e) {
                        new Noty({
                            text: "Message couldn't be sent",
                            type   : 'error',
                            theme  : 'mint',
                            layout : 'bottomRight',
                            timeout: 2000
                        }).show();
                    });
                });

                $(document).on('keypress','.ks-messages .ks-footer textarea',function (e) {
                    if(e.which===13)
                    {
                        e.preventDefault();
                        var txt = $('.ks-messages .ks-footer textarea');
                        var msg = txt.val().trim().replace(/(<([^>]+)>)/ig,"").trim();

                        if(msg === "")
                        {
                            return false;
                        }
                        var p = $.post( window.location.href.split('messages')[0] + "messages/send_message", {"convid":cid,"message":msg}).done(function (data) {
                            $('.ks-messages .ks-footer textarea').val("");
                            jsonObj = jQuery.parseJSON(data);
                            var dt = new Date();
                            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                            smileys.forEach(function (value) {
                                msg =  msg.toString().replace(value,'<img src="{{asset('user/assets/img/smiley/') }}' + '/' + value.replace(")",'').replace("(",'') + '.png" title="'+value+'" width="20" height="20">');
                            });
                            $('.ks-messages>.ks-body .ks-items').append('<li class="ks-item ks-self"><span class="ks-avatar ks-offline"><img src="{{asset((new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar())}}" width="36" height="36" class="rounded-circle"></span><div class="ks-body"><div class="ks-header"><span class="ks-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span><span class="ks-datetime">'+time+'</span></div><div class="ks-message">'+msg+'</div></div></li>')

                        }).fail(function (e) {
                            new Noty({
                                text: "Message couldn't be sent",
                                type   : 'error',
                                theme  : 'mint',
                                layout : 'bottomRight',
                                timeout: 2000
                            }).show();
                        });
                    }
                });
                //End of send message

                //Smileys Clickable
                $(document).on('click','.ks-smileys .ks-smileys-wrapper td img',function(e){
                    var txtMsg = $('.ks-messages .ks-footer textarea');
                    txtMsg.focus();
                    txtMsg.val(txtMsg.val().substring(0,txtMsg.caret()) + " " + $(this).attr('data-content') + " " + txtMsg.val().substring(txtMsg.caret()-1,txtMsg.val().length-1))
                    //$('.ks-messages .ks-footer textarea').val().append(' ' + $(this).attr('data-content') + ' ');

                });
                // End of Smileys Clickable


                if (Response.band(0, 800)) {
                    var ksMessagesView = $('.ks-messenger > .ks-messages');
                    var ksDiscussions = $('.ks-messenger > .ks-discussions > .ks-body .ks-items > .ks-item');
                    var ksViewCancel = $('.ks-mail > .ks-view .ks-view-cancel');

                    ksDiscussions.on('click', function () {
                        ksMessagesView.addClass('ks-open');
                    });

                    ksViewCancel.on('click', function() {
                        ksMessagesView.removeClass('ks-open');
                    });
                }
            });
        })(jQuery);
    </script>

    @endsection