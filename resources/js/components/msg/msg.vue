<template>
<div class="msg" :class="boxClass">
    <i class="icon" :class="iconClass"></i>
    <strong>{{ title }}</strong>
    <slot></slot>
</div>
</template>
<script>
export default {
    props:{
        'icon':String,
    },
    data(){
        return {
            boxClass:`sbg-${this.icon}`,
            iconClass:`icon-msg-${this.icon} text-${this.icon}`,
        }
    },
    methods:{
    }
}
</script>