<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="comment">
        <h4>Comments:</h4>
        <input type="text" class="newComment" id="newComment" v-model="newComment">
        <button @click="createComment" style="margin-left: 30px;">Post</button>
        <p style="text-align: center; color: red">@{{errorMessage}}</p>
        <div v-for="comment in comments">
            <h5>@{{comment.user_username}}</h5>
            <p>@{{comment.comment}}</p>
        </div>
    </div>

    <script>
        const Comment = {
            data() {
                return {
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
                        comment: this.newComment
                    }).then(response => {
                        this.comments.push(response.data);
                        this.newComment = "";
                        this.errorMessage = "";
                    }).catch(error => {
                        console.log(error.response.data);
                        this.errorMessage = error.response.data['message'];
                    })
                },
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