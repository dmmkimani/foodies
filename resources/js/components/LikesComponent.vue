<template>
  <div id="like" style="text-align: center; font-size: 18px">
    <div v-if="liked" style="display: inline-flex">
      <i class="bi bi-heart-fill"></i>
    </div>
    <div v-else style="display: inline-flex">
      <i class="bi bi-heart"></i>
    </div>
    @{{ num_likes }}
  </div>
</template>

<script>
export default {
  data() {
    return {
      user_username: document
        .querySelector("meta[name='user_username']")
        .getAttribute("content"),
      num_likes: null,
      liked: null,
    };
  },
  mounted() {
    axios
      .get(
        "{{route('api.likes.show', ['user'=>$user, 'likeable_type'=>$likeable_type, 'likeable_id'=>$likeable_id])}}"
      )
      .then((response) => {
        this.num_likes = response.data[0];
        this.liked = response.data[1];
      })
      .catch((response) => {
        console.log(response);
      });
  },
};
</script>