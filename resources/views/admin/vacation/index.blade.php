<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <table class="table">
            <thead>
                <th>名前</th>
                <th>E-Mail</th>
                <th>日付</th>
                <th>理由</th>
                <th>承認状態</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td v-text="user.name"></td>
                    <td v-text="user.email"></td>
                    <td v-text="user.date"></td>
                    <td v-text="user.reason"></td>
                    <td>
                        <div class="text-success" v-if="user.accepted">承認済み</div>
                        <div class="text-danger" v-else>未承認</div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" @click="accept(user.id, true)">承認する</button>
                        <button type="button" class="btn btn-sm btn-light" @click="accept(user.id, false)">しない</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <script>

        new Vue({
            el: '#app',
            data: {
                users: []
            },
            methods: {
                getUsers() {

                    const url = '/admin/vacation/ajax/user_accept';
                    axios.get(url)
                        .then(response => {

                            this.users = response.data;

                        });

                },
                accept(userId, accepted) {

                    if(confirm('承認状態を変更します。よろしいですか？')) {

                        const url = '/admin/vacation/ajax/user_accept/accept';
                        const params = {
                            user_id: userId,
                            accept: accepted
                        };
                        axios.post(url, params)
                            .then(response => {

                                if(response.data.result) {

                                    this.getUsers();

                                }

                            });

                    }

                }
            },
            mounted() {

                this.getUsers();

            }
        });

    </script>
</body>
</html>
