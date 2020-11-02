<template>
    <div class="card">
        <div class="card-header">Example Component</div>

        <div class="card-body">
            {{ body }}
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                body: "I'm an example component."
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
