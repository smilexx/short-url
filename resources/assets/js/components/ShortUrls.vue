<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">You short urls</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>Url</th>
                                <th>Short</th>
                                <th>Count redirects</th>
                                <th>Created</th>
                                <th>Last redirect</th>
                            </thead>
                            <tbody>
                                <tr v-for="item of shortUrls">
                                    <td><a href="item.url">{{ item.url }}</a></td>
                                    <td><a href="item.short_url">{{ item.short_url }}</a></td>
                                    <td>{{ item.views }}</td>
                                    <td>{{ item.created_at }}</td>
                                    <td>{{ item.updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.loadUrls();
        },
        data() {
            return {
                message: 'hello',
                shortUrls: []
            }
        },
        methods: {
            loadUrls: function () {
                var self = this;
                window.axios.get('/api/short-url')
                    .then(function(result){
                        self.shortUrls = result.data.data;
                    });
            }
        }
    }
</script>
