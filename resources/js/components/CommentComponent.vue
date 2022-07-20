<template>
    <div>
        <div class="comments">
            <h2 class="section-title mb-5">Комментарии ({{ commentsCount }})</h2>

            <div class="comment-block" v-for="comment in comments">
                <p class="comment-name">{{ comment.userName }}</p>
                <p class="comment-date">{{ comment.date }}</p>
                <p class="comment-message">{{ comment.message }}</p>
            </div>

        </div>

        <h2 class="section-title mb-5" data-a os="fade-up">Добавить комментарий</h2>

        <div class="row">
            <div class="form-group col-12" data-aos="fade-up">
                <label for="comment" class="sr-only">Ваш комментарий</label>
                <textarea name="message" id="comment" class="form-control" placeholder="Введите комментарий" rows="10"
                    v-model="message"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <button @click="sendComment" class="btn btn-warning">Отправить</button>

            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "CommentComponent",

    props: [
        'postId',
    ],

    data() {
        return {
            comments: null,
            commentsCount: null,
            message: null
        }
    },

    mounted() {
        this.getComments()
    },

    methods: {
        getComments() {
            axios.get('/posts/' + this.postId + '/comments')
                .then(res => {
                    console.log(res.data)
                    this.comments = res.data.comments
                    this.commentsCount = res.data.commentsCount
                })
        },

        sendComment() {
            axios.post('/posts/' + this.postId + '/comments', {
                message: this.message
            })
                .then(res => {
                    console.log(res.data)
                    this.message = null
                    this.getComments()
                })
        }
    }
}
</script>
