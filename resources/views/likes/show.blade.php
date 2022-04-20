<!DOCTYPE html>
<html>

<head>
    @if (auth()->check())
    <meta name="user_username" content="{{auth()->user()->username}}">
    @endif

    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="like" style="text-align: center; font-size: 18px">
        <div v-if="liked" style="display: inline-flex">
            <i @click="unlike" class="bi bi-heart-fill"></i>
        </div>
        <div v-else style="display: inline-flex">
            <i @click="like" class="bi bi-heart"></i>
        </div>
        @{{likes.length}}
    </div>

    <script>
        const Like = {
            data() {
                return {
                    user_username: document.querySelector("meta[name='user_username']").getAttribute('content'),
                    likeable_id: null,
                    likeable_type: null,
                    likes: [],
                    liked: null
                }
            },
            methods: {
                like() {
                    axios.post("{{route('api.likes.store')}}", {
                        user_username: this.user_username,
                        likeable_id: this.likeable_id,
                        likeable_type: this.likeable_type,
                    }).then(response => {
                        this.likes.push(response.data);
                        this.liked = true;
                    }).catch(response => {
                        console.log(error.response.data);
                    })
                },
                unlike() {
                    axios.delete("{{route('api.likes.destroy')}}", {
                        params: {
                            user_username: this.user_username,
                            likeable_id: this.likeable_id,
                            likeable_type: this.likeable_type,
                        }
                    }).then(response => {
                        this.likes.pop();
                        this.liked = false;
                    }).catch(response => {
                        console.log(response);
                    })
                }
            },
            mounted() {
                axios.get("{{route('api.likes.show', ['user'=>$user, 'likeable_type'=>$likeable_type, 'likeable_id'=>$likeable_id])}}")
                    .then(response => {
                        this.likeable_id = response.data[0];
                        this.likeable_type = response.data[1];
                        this.likes = response.data[2];
                        this.liked = response.data[3];
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        }
        Vue.createApp(Like).mount('#like');
    </script>
</body>

</html>