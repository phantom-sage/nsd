<template>
    <div>
        <span class="en-font-600" style="font-size: 20px;" v-if="likesNumberData > 0">
            {{ likesNumberData }}
            <i class="fa fa-heart like-heart" :class="pointerClass" aria-hidden="true" @click.once="incrementPostLikesNumber"></i>
        </span>
        <span class="en-font-600" style="font-size: 15px;" v-if="likesNumberData == 0">
            <i class="fa fa-heart-o" :class="pointerClass" aria-hidden="true" @click.once="incrementPostLikesNumber"></i>
            0
        </span>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: 'CommentsComponent',
        props: ['lang', 'likesNumber', 'postId'],
        data() {
            return {
                likesNumberData: this.likesNumber,
                pointerClass: 'pointer-class'
            }
        },
        methods: {
            incrementPostLikesNumber() {
                axios.post(`/api/likes/store/${this.postId}/${this.lang}`, null, { headers: { 'Accept': 'Application/json' } })
                .then(res => {
                    //console.log(res)
                    //console.log(res.data.like)
                    this.likesNumberData = res.data.like
                    this.pointerClass = 'pointer-class-none'
                })
                .catch(err => console.log(err))
            }
        }
    }
</script>


<style scoped>
    .pointer-class:hover {
        cursor: pointer;
    }
    .pointer-class-none {
        cursor: not-allowed;
    }
</style>