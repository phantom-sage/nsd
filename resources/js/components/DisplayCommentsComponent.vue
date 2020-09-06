<template>
    <div>
        <span class="en-font-600" style="font-size: 20px;" v-if="likesNumberData > 0">
            {{ likesNumberData }}
            <i class="fa fa-heart like-heart" aria-hidden="true"></i>
        </span>
        <span class="en-font-600" style="font-size: 15px;" v-if="likesNumberData == 0">
            <i class="fa fa-heart-o" aria-hidden="true"></i>
            0
        </span>
    </div>
</template>

<script>
    export default {
        name: 'DisplayCommentsComponent',
        props: ['likesNumber'],
        data() {
            return {
                likesNumberData: this.likesNumber
            }
        }
    }
</script>