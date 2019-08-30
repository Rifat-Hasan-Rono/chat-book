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
                    <a @click="getProfile(0)">
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
                            <a class="btn btn-light" data-toggle="modal" data-target="#newGroup">
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
                    <ul class="list-group list-group-flush" v-for="value in conversationList" :key="value.index">
                        <!-- <li class="list-group-item">
                            <figure class="avatar avatar-state-success">
                                <img src="dist/media/img/man_avatar1.jpg" class="rounded-circle">
                            </figure>
                            <div class="users-list-body">
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action">
                                    <div class="new-message-count">2</div>
                                </div>
                            </div>
                        </li> -->
                        <li class="list-group-item" :class="{ 'open-chat' : value.conv_id == conversationId}">
                            <div >
                                <figure class="avatar" :class="[checkOnline(value.id) ? 'avatar-state-success' : 'avatar-state-warning']">
                                    <img v-if="value.picture" v-bind:src="'public/profile-picture/' + value.picture" class="rounded-circle">
                                    <span v-else class="avatar-title bg-success rounded-circle">{{value.first_name.charAt(0)}}{{value.last_name.charAt(0)}}</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>{{value.first_name}} {{value.last_name}}</h5>
                                <p>{{value.last_message}}</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a @click="getMessage(value.id, value.conv_id)" class="dropdown-item">Open</a>
                                            <a @click="getProfile(value.id)" class="dropdown-item">Profile</a>
                                            <a class="dropdown-item">Add to archive</a>
                                            <a class="dropdown-item">Delete</a>
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
                            <a class="btn btn-light" @click="sentRequest()" data-toggle="tooltip" title="Send Requests">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item" v-if="friendListHeader == 'Find Friends' || friendListHeader == 'Send Requests'">
                            <a class="btn btn-light" @click="getRequest()" data-toggle="tooltip" title="Receive Requests">
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-light" @click="invite()" v-if="friendListHeader == 'Find Friends'" data-toggle="tooltip" title="Send Invitation">
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
                    <ul class="list-group list-group-flush"  v-for="value in friendList" :key="value.index">
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar mr-3 item-rtl" >
                                    <img v-if="value.picture" v-bind:src="'public/profile-picture/' + value.picture" class="rounded-circle">
                                    <span v-else class="avatar-title bg-info rounded-circle">{{value.first_name.charAt(0)}}{{value.last_name.charAt(0)}}</span>
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
                                            <a @click="getMessage(value.id,0)" class="dropdown-item">Open</a>
                                            <a @click="addFriend(value.id)"  v-if="friendListHeader == 'Find Friends'" class="dropdown-item">Add Friend</a>
                                            <a @click="confirmFriend(value.id)" v-if="friendListHeader == 'Receive Requests'" class="dropdown-item">Confirm Friend</a>
                                            <a @click="cancelRequest(value.id)" v-if="friendListHeader == 'Send Requests'" class="dropdown-item">Cancel Request</a>
                                            <a @click="deleteRequest(value.id)" v-if="friendListHeader == 'Receive Requests'" class="dropdown-item">Delete</a>
                                            <a @click="removeFriend(value.id)" v-if="friendListHeader == 'Friends'" class="dropdown-item">Remove Friend</a>
                                            <a @click="getProfile(value.id)" class="dropdown-item">Profile</a>
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
                    </ul>
                </div>
            </div>
            <!-- ./ Stars sidebar -->

        </div>
        <!-- ./ sidebar group -->

        <!-- chat -->
        <div class="chat">
            <div class="chat-header" v-if="chatFriendProfile">
                <div class="chat-header-user">
                    <figure class="avatar avatar-lg">
                        <img v-if="chatFriendProfile.picture" v-bind:src="'public/profile-picture/' + chatFriendProfile.picture" class="rounded-circle">
                        <span v-else class="avatar-title bg-success rounded-circle">{{chatFriendProfile.first_name.charAt(0)}}{{chatFriendProfile.last_name.charAt(0)}}</span>
                    </figure>
                    <div>
                        <h5>{{chatFriendProfile.first_name}} {{chatFriendProfile.last_name}}</h5>
                        <small class="text-muted">
                            <i v-if="checkOnline(chatFriendProfile.id)">Online</i>
                            <i v-else>Offline</i>
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
                                <a @click="getProfile(chatFriendProfile.id)" class="dropdown-item">Profile</a>
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
                <div class="messages" v-for="value in chatMessages" :key="value.index">
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
                    <div v-if="chatFriendProfile.id == value.user_id" class="message-item">
                        <div class="message-content">{{value.message}}</div>
                        <div class="message-action">
                            {{value.created_at | date}}
                            <!-- <vue-moments-ago prefix="posted" suffix="ago" date="value.created_at | date"></vue-moments-ago> -->
                        </div>
                    </div>
                    <div v-else class="message-item outgoing-message">
                        <div class="message-content">{{value.message}}</div>
                        <div class="message-action">
                            {{value.created_at | date}} <i class="ti-double-check"></i>
                        </div>
                    </div>
                    <!-- <div v-if="typing !== ''" class="badge badge-pill">
                        {{typing}}
                    </div> -->
                </div>
            </div>
            <div class="chat-footer">
                <form @submit.prevent="sendMessage">
                    <input type="text" class="form-control" placeholder="Type your message"
                           aria-label="Type your message" v-model="message" aria-describedby="button-addon2">
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

        <!-- about -->
        <ProfileComponent :friendProfile.sync="friendProfile"></ProfileComponent>
        <!-- ./ about -->

    </div>
    <!-- ./ content -->

    <!-- edit profile modal -->
    <UserComponent :userProfile.sync="userProfile" :tab.sync="tab"></UserComponent>    
    <!-- ./ edit profile modal -->
    
    <!-- add friends modal -->
    <InviteComponent></InviteComponent>
    <!-- ./ add friends modal -->


</div>
<!-- ./ layout -->
</template>
<script>
import Echo from 'laravel-echo'
import Pusher from 'pusher-js'
import VueMomentsAgo from 'vue-moments-ago'
import InviteComponent from './InviteComponent.vue'
import ProfileComponent from './ProfileComponent.vue'
import UserComponent from './UserComponent.vue'
export default {
    name: 'laravel-echo',
    data() {
    return {
      userId: '',
      tab: 'personal',
      conversationId: '',
      conversationList: '',
      message: '',
      friendList: '',
      friendListHeader: '',
      friendProfile: '',
      chatFriendProfile: '',
      userProfile: '',
      chatMessages: [],
      onlineUser: [],
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
  components: {
    VueMomentsAgo,
    InviteComponent,
    ProfileComponent,
    UserComponent
  },
  methods: {
    /* Connect user with WS */
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

    /* Disconnect the WS connection*/
    disconnect(){
        if(!this.echo) return
        this.echo.disconnect()
    },

    /* Connect user with user to the channel */
    bindChannels(){
        axios
        .post("/api/auth/me" , {token: localStorage.getItem("access_token")})
        .then(response => {
            this.userId = response.data.id
            this.echo.join('notification-channel')
                .here((users) => {
                    this.onlineUser = users
                })
                .joining((user) => {
                    this.onlineUser.push(user)
                })
                .leaving((user) => {
                    this.onlineUser = this.onlineUser.filter(u => u != user)
                });
 
            this.echo.private('chat-channel.'+response.data.id)
            .listen('ChatEvent', (e) => {
                if(e.message.conversation_id == this.conversationId){
                    this.chatMessages.push({
                        message: e.message.message,
                        user_id: e.message.user_id,
                        conversation_id: e.message.conversation_id,
                        created_at: e.message.created_at
                    }) 
                }
                console.log(e);
            });
        })
        .catch(error => {
          console.log(error);
        });
    },

    /* Log Out current user and clear everything */
    logout() {
      axios
        .post("/api/auth/logout" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.disconnect()
          this.$router.push("/login");
          localStorage.removeItem("access_token");
          localStorage.removeItem("pusherTransportTLS");
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },

    /* Get list of all user whom are not connected */
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

    /* Get list of all friend */    
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

    /* Get list of friend request sent by other user */
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

    /* Get list of friend request sent to other user */    
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

    /* Get list of message with chat friend */
    getConversationList() {
      axios
        .post("/api/auth/conversation-list" , {token: localStorage.getItem("access_token")})
        .then(response => {
          this.conversationList = response.data
          if(this.conversationList){
              this.chatFriendProfile = this.conversationList[0]
              this.getMessage(this.chatFriendProfile.id, this.chatFriendProfile.conv_id)
          }
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    
    /* Get conversation with a user */
    getMessage(id, conv_id) {
        this.conversationId = conv_id
        axios
        .post("/api/auth/get-message" , {
            token: localStorage.getItem("access_token"),
            conv_id: conv_id,
            id: id
        })
        .then(response => {
            this.chatFriendProfile = response.data.friend
            this.chatMessages = response.data.conversations;
            // console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },

    /* Send message to a specific user */
    sendMessage() {
        if(this.message.length > 0){
            this.chatMessages.push({
                message: this.message,
                user_id: this.userId,
                conversation_id: this.conversationId,
                created_at: new Date().getTime()
                })
            axios
            .post("/api/auth/send-message" , {
                token: localStorage.getItem("access_token"),
                message: this.message,
                conv_id: this.conversationId,
                receiver_id: this.chatFriendProfile.id
                })
            .then(response => {
                this.message = "";   
            })
            .catch(error => {
            console.log(error);
            });
        }
    },

    /* Sent friend request to a user */
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

    /* Accept friend request from a user */
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

    /* Remove a user from friend list */
    removeFriend(id) {
      axios
        .post("/api/auth/remove-friend" , {token: localStorage.getItem("access_token"),
        id: id})
        .then(response => {
        //   this.changeTab('friends_request')
          this.getFriends()
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

    /* Cancel a friend request sent to a user */
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

    /* Get profile of a registered user */
    getProfile(id) {
        axios
        .post("/api/auth/get-profile" , {token: localStorage.getItem("access_token"),
        id: id})
        .then(response => {
        if(id == 0){
            this.userProfile = response.data
            $("#editProfileModal").appendTo("body").modal('show');
        }else{
            this.friendProfile = response.data
        }
        console.log(response.data);
        })
        .catch(error => {
        console.log(error);
        });
    },

    /* Delete a friend request sent by other user */
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

    /* Check online users */
    checkOnline(id) {
        return _.find(this.onlineUser,{id: id})
    },

    invite() {
        $("#addFriends").appendTo("body").modal('show');
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
            this.getConversationList()
        }
    }
  },
  mounted() {
        this.connect()
        this.bindChannels()
        this.getConversationList()

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