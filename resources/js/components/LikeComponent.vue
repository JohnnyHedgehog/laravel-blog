<template>
    <div @click.prevent="plusLike()"
        class="bg-transparent border-0 blog-post-category mr-1 like-count liked-post-text d-flex">
        <span class="blog-post-category mr-1">{{ likesCount }}</span>
        <div v-if="isLiked == true"> <i class="nav-icon fas fa-heart"></i></div>
        <div v-else="isLiked == false"> <i class="nav-icon far fa-heart"></i></div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "LikeComponent",

    props: [
        'postId',
        'postLikedUsersCount',
        'userLikesThisPost'
    ],

    data() {
        return {
            likesCount: this.postLikedUsersCount,
            isLiked: this.userLikesThisPost
        }
    },


    methods: {
        plusLike() {
            axios.post('/posts/' + this.postId + '/likes')
                .then(res => {
                    console.log(res.data)
                    this.isLiked = res.data.isLiked
                    this.likesCount = res.data.likesCount
                })
        }
    }
}
</script>
