<template>
<!-- layout -->
<div class="layout">

    <!-- navigation -->
    <nav class="navigation">
        <div class="nav-group">
            <ul>
                <li>
                    <a class="logo" href="#">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="33.004px" height="33.003px" viewBox="0 0 33.004 33.003" style="enable-background:new 0 0 33.004 33.003;"
                             xml:space="preserve">
                            <g>
                                <path d="M4.393,4.788c-5.857,5.857-5.858,15.354,0,21.213c4.875,4.875,12.271,5.688,17.994,2.447l10.617,4.161l-4.857-9.998
                                    c3.133-5.697,2.289-12.996-2.539-17.824C19.748-1.072,10.25-1.07,4.393,4.788z M25.317,22.149l0.261,0.512l1.092,2.142l0.006,0.01
                                    l1.717,3.536l-3.748-1.47l-0.037-0.015l-2.352-0.883l-0.582-0.219c-4.773,3.076-11.221,2.526-15.394-1.646
                                    C1.469,19.305,1.469,11.481,6.277,6.672c4.81-4.809,12.634-4.809,17.443,0.001C27.919,10.872,28.451,17.368,25.317,22.149z"/>
                                <g>
                                    <circle cx="9.835" cy="16.043" r="1.833"/>
                                    <circle cx="15.502" cy="16.043" r="1.833"/>
                                    <circle cx="21.168" cy="16.043" r="1.833"/>
                                </g>
                            </g>
                            <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a data-navigation-target="chats" class="active" @click="changeTab('chats')" data-toggle="tooltip" title="Chats">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a data-navigation-target="friends" @click="changeTab('friends_list')" class="notifiy_badge" data-toggle="tooltip" title="Friends">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a data-navigation-target="friends" @click="changeTab('friends_request')" class="notifiy_badge" data-toggle="tooltip" title="Find Friends">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>
                </li>
                <li data-navigation-target="favorites" class="brackets">
                    <a href="#">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#editProfileModal">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#settingModal">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a @click="logout" data-toggle="tooltip" title="Log Out">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- ./ navigation -->

    <!-- content -->
    <div class="content">

        <!-- sidebar group -->
        <div class="sidebar-group">

            <!-- Chats sidebar -->
            <div id="chats" class="sidebar active">
                <header>
                    <span>Chats</span>
                    <ul class="list-inline">
                        <li class="list-inline-item" data-toggle="tooltip" title="New Group" >
                            <a class="btn btn-light" href="#" data-toggle="modal" data-target="#newGroup">
                                <i class="fa fa-users"></i>
                            </a>
                        </li>
                        <li class="list-inline-item d-lg-none d-sm-block">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form action="#">
                    <input type="text" class="form-control" placeholder="Search chat">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <figure class="avatar avatar-state-success">
                                <img src="dist/media/img/man_avatar1.jpg" class="rounded-circle">
                            </figure>
                            <div class="users-list-body">
                                <h5>Patsy Paulton</h5>
                                <p>Traditional heading elscas sdscsd sdcsdsc</p>
                                <div class="users-list-action">
                                    <div class="new-message-count">2</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item open-chat">
                            <div>
                                <figure class="avatar">
                                    <img src="dist/media/img/man_avatar3.jpg" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="avatar-group">
                                <figure class="avatar">
                                    <span class="avatar-title bg-warning bg-success rounded-circle">
                                        <i class="fa fa-users"></i>
                                    </span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Entertainment Group</h5>
                                <p><strong>Maher Ruslandi: </strong>Hello!!!</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <img src="dist/media/img/women_avatar1.jpg" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Jennica Kindred</h5>
                                <p>I know how important this file is to you. You can trust me ;)</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-info rounded-circle">M</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Marvin Rohan</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="dist/media/img/man_avatar2.jpg" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Frans Hanscombe</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Chats sidebar -->

            <!-- Friends sidebar -->
            <div id="friends" class="sidebar">
                <header>
                    <span>{{friendListHeader}}</span>
                    <ul class="list-inline">
                        <li class="list-inline-item" v-if="friendListHeader == 'Receive Requests'">
                            <a class="btn btn-light" @click="sentRequest()" data-toggle="tooltip" title="Send Request">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item" v-if="friendListHeader != 'Receive Requests'">
                            <a class="btn btn-light" @click="getRequest()" data-toggle="tooltip" title="Receive Request">
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-light" v-if="friendListHeader == 'Find Friends'" data-toggle="tooltip" title="Send Invitation">
                                <i class="fa fa-external-link" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item d-lg-none d-sm-block">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form action="#">
                    <input type="text" class="form-control" placeholder="Search chat">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush"  v-for="value in friendList" :key=value.index>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="dist/media/img/women_avatar5.jpg" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>{{value.first_name}} {{value.last_name}}</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a @click="addFriend(value.id)"  v-if="friendListHeader == 'Find Friends'" class="dropdown-item">Add Friend</a>
                                            <a @click="confirmFriend(value.id)" v-if="friendListHeader == 'Receive Requests'" class="dropdown-item">Confirm Friend</a>
                                            <a @click="cancelRequest(value.id)" v-if="friendListHeader == 'Send Requests'" class="dropdown-item">Cancel Request</a>
                                            <a @click="deleteRequest(value.id)" v-if="friendListHeader == 'Receive Requests'" class="dropdown-item">Delete</a>
                                            <a @click="friendProfile(value.id)" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Friends sidebar -->

            <!-- Favorites sidebar -->
            <div id="favorites" class="sidebar">
                <header>
                    <span>Favorites</span>
                    <ul class="list-inline">
                        <li class="list-inline-item d-lg-none d-sm-block">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form action="#">
                    <input type="text" class="form-control" placeholder="Search favorites">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush users-list">
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Jennica Kindred</h5>
                                <p>I know how important this file is to you. You can trust me ;)</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Marvin Rohan</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Frans Hanscombe</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Stars sidebar -->

        </div>
        <!-- ./ sidebar group -->

        <!-- chat -->
        <div class="chat">
            <div class="chat-header">
                <div class="chat-header-user">
                    <figure class="avatar avatar-lg">
                        <img src="dist/media/img/man_avatar3.jpg" class="rounded-circle">
                    </figure>
                    <div>
                        <h5>Karl Hubane</h5>
                        <small class="text-muted">
                            <i>Online</i>
                        </small>
                    </div>
                </div>
                <div class="chat-header-action">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-success">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-secondary">
                                <i class="fa fa-video-camera" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-secondary" data-toggle="dropdown">
                                <i class="ti-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Add to archive</a>
                                <a href="#" class="dropdown-item">Delete</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Block</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="chat-body" v-chat-scroll> <!-- .no-message -->
                <!--
                <div class="no-message-container">
                    <i class="fa fa-comments-o"></i>
                    <p>Select a chat to read messages</p>
                </div>
                -->
                <div class="messages" v-for="value, index in chat.messages" :key=value.index>
                    <!-- <div class="message-item outgoing-message">
                        <div class="message-content">
                            Hey, Maher! I'm waiting for you to send me the files.
                        </div>
                        <div class="message-action">
                            Am 09:34 <i class="ti-double-check"></i>
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content">
                            I'm sorry :( I'll send you as soon as possible.
                        </div>
                        <div class="message-action">
                            Pm 14:20
                        </div>
                    </div>
                    <div class="message-item outgoing-message">
                        <div class="message-content">
                            I'm waiting. Thank you :)
                        </div>
                        <div class="message-action">
                            Pm 14:25 <i class="ti-double-check"></i>
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content">
                            I'm sending files now.
                        </div>
                        <div class="message-action">
                            Pm 14:20
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content message-file">
                            <div class="file-icon">
                                <i class="ti-file"></i>
                            </div>
                            <div>
                                <div>important_documents.pdf <i class="text-muted small">(50KB)</i></div>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#">Download</a></li>
                                    <li class="list-inline-item"><a href="#">View</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="message-action">
                            Pm 14:25
                        </div>
                    </div>
                    <div class="message-item outgoing-message">
                        <div class="message-content">
                            Thank you so much. After I review these files, I will give you my opinion. If there's a problem, you can send it back. Good luck with!
                        </div>
                        <div class="message-action">
                            Pm 14:50 <i title="Message could not be sent" class="ti-info-alt text-danger"></i>
                        </div>
                    </div> -->
                    <div v-if="chat.user[index] !== 'You'" class="message-item">
                        <div class="message-content">{{value}}</div>
                        <div class="message-action"></div>
                    </div>
                    <div v-if="chat.user[index] === 'You'" class="message-item outgoing-message">
                        <div class="message-content">{{value}}</div>
                        <div class="message-action">
                            Pm 14:50 <i class="ti-double-check"></i>
                        </div>
                    </div>
                    <div v-if="typing !== ''" class="badge badge-pill">
                        {{typing}}
                    </div>
                </div>
            </div>
            <div class="chat-footer">
                <form @submit.prevent="sendMessage">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" v-model="message" aria-describedby="button-addon2">
                    <div class="form-buttons">
                        <button class="btn btn-light btn-floating" type="button">
                            <i class="fa fa-paperclip"></i>
                        </button>
                        <button class="btn btn-light btn-floating" type="button">
                            <i class="fa fa-microphone"></i>
                        </button>
                        <button class="btn btn-primary btn-floating" type="submit">
                            <i class="fa fa-send"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- ./ chat -->

        <div class="sidebar-group">
            <div id="contact-information" class="sidebar">
                <header>
                    <span>About</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="sidebar-body">
                    <div class="pl-4 pr-4 text-center">
                        <figure class="avatar avatar-state-danger avatar-xl mb-4">
                            <img src="dist/media/img/women_avatar5.jpg" class="rounded-circle">
                        </figure>
                        <h5 class="text-primary">Frans Hanscombe</h5>
                        <p class="text-muted">Last seen: Today</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>About</h6>
                        <p class="text-muted">I love reading, traveling and discovering new things. You need to be happy in life.</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Phone</h6>
                        <p class="text-muted">(555) 555 55 55</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Media</h6>
                        <div class="files">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                        <span class="avatar-title bg-warning">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </span>
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                            <img src="dist/media/img/women_avatar1.jpg">
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                            <img src="dist/media/img/women_avatar3.jpg">
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                            <img src="dist/media/img/women_avatar4.jpg">
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                        <span class="avatar-title bg-success">
                                            <i class="fa fa-file-excel-o"></i>
                                        </span>
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                        <span class="avatar-title bg-info">
                                            <i class="fa fa-file-text-o"></i>
                                        </span>
                                        </figure>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>City</h6>
                        <p class="text-muted">Germany / Berlin</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Website</h6>
                        <p>
                            <a href="#">www.franshanscombe.com</a>
                        </p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Social Links</h6>
                        <ul class="list-inline social-links">
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-whatsapp">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-google">
                                    <i class="fa fa-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-behance">
                                    <i class="fa fa-behance"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <div class="form-group">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch11">
                                <label class="custom-control-label" for="customSwitch11">Block</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch12">
                                <label class="custom-control-label" for="customSwitch12">Mute</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch13">
                                <label class="custom-control-label" for="customSwitch13">Get notification</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./ content -->

</div>
<!-- ./ layout -->
</template>
<script>
import Echo from 'laravel-echo'
import Pusher from 'pusher-js'
export default {
    name: 'laravel-echo',
    data() {
    return {
      message: '',
      friendList: '',
      friendListHeader: '',
      chat: {
          messages:[],
          user: [],
          time: []
      },
      typing: ''
    };
  },
//   watch: {
//       message(){
//           Echo.channel('chat-channel')
//           .whisper('typing', {
//           name: this.message
//         });
//       }
//   },
  methods: {
    connect(){
    if(!this.echo){
        this.echo = new Echo({
            broadcaster: 'pusher',
            key: 'c3c2e3700ece86a11862',
            cluster: 'ap1',
            forceTLS: true,
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                Authorization: null
                }
            },
        })
            this.echo.connector.pusher.connection.bind('connected', (event) => this.connect(event))
            this.echo.connector.pusher.connection.bind('disconnected', () => this.disconnect())
        }
        this.echo.connector.pusher.config.auth.headers.Authorization = 'Bearer ' + localStorage.getItem("access_token")
        this.echo.connector.pusher.connect()
    },
    disconnect(){
        if(!this.echo) return
        this.echo.disconnect()
    },
    bindChannels(){
    this.echo.private('chat-channel')
    .listen('ChatEvent', (e) => {
        this.chat.messages.push(e.message);  
        this.chat.user.push(e.message);  
        console.log(e);
        })
    },
    logout() {
      axios
        .post("/api/auth/logout" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.$router.push("/login");
          localStorage.removeItem("access_token");
          console.log(response.data);
          this.disconnect()
        })
        .catch(error => {
          console.log(error);
        });
    },
    sendMessage() {
        if(this.message.length > 0){
            this.chat.messages.push(this.message);  
            this.chat.user.push("You");  
            axios
            .post("/api/auth/send-message" , {
                token: localStorage.getItem("access_token"),
                message: this.message
                })
            .then(response => {
                this.message = "";    
                console.log(response.data);
            })
            .catch(error => {
            console.log(error);
            });
        }
    },
    findFriends() {
      axios
        .post("/api/auth/find-friends" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.friendList = response.data
          this.friendListHeader = 'Find Friends'
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    getFriends() {
      axios
        .post("/api/auth/get-friends" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.friendList = response.data
          this.friendListHeader = 'Friends'
          console.log(this.friendList);
        })
        .catch(error => {
          console.log(error);
        });
    },
    getRequest() {
      axios
        .post("/api/auth/get-request" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.friendList = response.data
          this.friendListHeader = 'Receive Requests'
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    sentRequest() {
      axios
        .post("/api/auth/sent-request" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.friendList = response.data
          this.friendListHeader = 'Send Requests'
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    addFriend(id) {
      axios
        .post("/api/auth/add-friend" , {token: localStorage.getItem("access_token"),
        id: id})
        .then(response => {
          this.changeTab('friends_request')
          Toast.fire({
              type: response.data.type,
              title: response.data.title
            });
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    confirmFriend(id) {
      axios
        .post("/api/auth/confirm-friend" , {token: localStorage.getItem("access_token"),
        id: id})
        .then(response => {
        //   this.changeTab('friends_request')
          this.getRequest()
          Toast.fire({
              type: response.data.type,
              title: response.data.title
            });
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    cancelRequest(id) {
      axios
        .post("/api/auth/cancel-request" , {token: localStorage.getItem("access_token"),
        id: id})
        .then(response => {
        //   this.changeTab('friends_request')
          this.sentRequest()
          Toast.fire({
              type: response.data.type,
              title: response.data.title
            });
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    deleteRequest(id) {
      axios
        .post("/api/auth/delete-request" , {token: localStorage.getItem("access_token"),
        id: id})
        .then(response => {
        //   this.changeTab('friends_request')
          this.getRequest()
          Toast.fire({
              type: response.data.type,
              title: response.data.title
            });
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    changeTab(type) {
        if(type == 'friends_list'){
            $('div#chats').removeClass('active')
            $('div#friends').addClass('active')
            this.getFriends()
        }else if(type == 'friends_request'){
            $('div#chats').removeClass('active')
            $('div#friends').addClass('active')
            this.findFriends()
        }else{
            $('div#friends').removeClass('active')
            $('div#chats').addClass('active')
        }
    }
  },
  mounted() {
        this.connect()
        this.bindChannels()
      
    //   Echo.private('chat-channel')
    //     .listen('ChatEvent', (e) => {
    //     this.chat.messages.push(e.message);  
    //     this.chat.user.push(e.message);  
    //     console.log(e);
    //     })
        // .listenForWhisper('typing', (e) => {
        //     if(e.name != ''){
        //         this.typing = 'typing...';
        //     }
        // });
  }
};
</script>