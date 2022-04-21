<!DOCTYPE html>
<html>

<head>
    @if (auth()->check())
    <meta name="admin" content="{{auth()->user()->admin}}">
    <meta name="user_username" content="{{auth()->user()->username}}">
    @endif

    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="comment">
        <h4>Comments:</h4>
        <div v-if="admin != true">
        <input type="text" class="newComment" id="newComment" v-model="newComment">
        <button @click="createComment" style="margin-left: 30px;">Post</button>
        <p style="text-align: center; color: red">@{{errorMessage}}</p>
        </div>
        <div v-for="(comment, index) in comments" :key="comment.id">
            <h5>
                <a v-bind:href="'/users/' + comment.user_username">
                    @{{comment.user_username}}
                </a>
            </h5>
            <p>@{{comment.comment}}</p>
            <div v-if="comment.user_username == user_username || admin == true">
                <button @click="deleteComment(index)" style="color: red">Delete</button>
            </div>
        </div>
    </div>

    <script>
        const Comment = {
            data() {
                return {
                    admin: document.querySelector("meta[name='admin']").getAttribute('content'),
                    user_username: document.querySelector("meta[name='user_username']").getAttribute('content'),
                    post_id: null,
                    comments: [],
                    newComment: "",
                    errorMessage: "",
                }
            },
            methods: {
                createComment() {
                    axios.post("{{route('api.comments.store')}}", {
                        post_id: this.post_id,
                        comment: this.newComment,
                    }).then(response => {
                        this.comments.push(response.data);
                        this.newComment = "";
                        this.errorMessage = "";
                    }).catch(error => {
                        console.log(error.response.data);
                        this.errorMessage = error.response.data['message'];
                    })
                },
                deleteComment(index) {
                    axios.delete("{{route('api.comments.destroy')}}", {
                        params: {
                            comment_id: this.comments[index].id
                        }
                    }).then(response => {
                        this.comments.splice(index, 1);
                    }).catch(response => {
                        console.log(response);
                    })
                }
            },
            mounted() {
                axios.get("{{route('api.comments.show', ['post'=>$post])}}")
                    .then(response => {
                        this.post_id = response.data[0];
                        this.comments = response.data[1];
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        }
        Vue.createApp(Comment).mount('#comment');
    </script>
</body>

</html>