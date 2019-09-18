<template>
<div class="is-group mt-2">
    <a class="item btn btn-xs obtn text-muted" href="">
        <i class="icon icon-edit"></i>
    </a>
    <button class="item btn btn-xs obtn text-muted" @click ="del_post">
    <i class="icon icon-delete-m" :class="loadBtn"></i>
    </button>
</div>
</template>
<script>
export default {
    props:{
        'route':String
    },
    data(){
        return {
            loadBtn:'',
        }
    },
    methods:{
        del_post(){
            this.loadBtn = 'spinner-grow spinner-grow-sm';
            axios.delete(this.route).then(res=>{
                console.log(res.data);
                window.location.reload();
            })
        },
    }
}
</script>