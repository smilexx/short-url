<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add short url</div>

                    <div class="panel-body">
                        <div v-if="error || success" class="alert" v-bind:class="{ error: 'alert-danger', success: 'alert-success' }">
                            <button class="close" v-on:click="clearErrors()" aria-label="close">&times;</button>
                            {{ error }}
                            <div v-if="success">
                                You url add
                                <a href="success">{{ success }}</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input class="form-control" v-model="url">
                        </div>
                        <div class="form-group">
                            <label>Short url (not required)</label>
                            <input class="form-control" v-model="short_url">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" v-on:click="addUrl()">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {

        },
        data() {
            return {
                url: '',
                short_url: '',
                error : '',
                success: ''
            }
        },
        methods: {
            addUrl(){
                var self= this;
                window.axios.post('/api/short-url', { url: this.url, short_url: this.short_url })
                    .then(function (result) {
                        if (result.data.success){
                            self.success = result.data.data.short_url;
                        }else{
                            self.error = result.data.error;
                        }
                    })
                    .catch(function (error) {
                        self.error = error.response.data.error;
                    })
            },
            clearErrors(){
                this.success = '';
                this.error = '';
            }
        }
    }
</script>
