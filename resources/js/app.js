import Vue from "vue";
import LikeComponent from "./components/LikeComponent";
import CommentComponent from "./components/CommentComponent";

require('./bootstrap');

const app = new Vue({
    el: '#app',

    components: {
        LikeComponent,
        CommentComponent
    }

});
