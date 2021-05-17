<template>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pengguna</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-success" @click="showModal" >Tambah Pengguna</button>
                        </div>    
                    </div>

                    <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama Pengguna</th>
                                        <th>Level</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr v-for="item in users" :key="item.id">
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.level_id }}</td>
                                    <td>{{ item.Nomor_HP }}</td>
                                    <td>{{ item.email }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary mr-1">EDIT</button>
                                        <button class="btn btn-sm btn-danger ml-1">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <!-- Modal -->
                <div class="modal fade" id="modalmuncul" tabindex="-1" role="dialog" aria-labelledby="modalmuncul1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="simpanData()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label >Nama Pengguna</label>
                                <input type="text" class="form-control" v-model="form.name" placeholder="Masukan nama pengguna">
                            </div>
                            <div class="form-group">
                                <label >Level Pengguna</label>
                                <select class="form-control select2" v-model="form.level_id">
                                    <option value>Pilih Level</option>
                                    <option v-for="item in levels" :key="item.id" :value="item.id">{{item.Nama_Level}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Nomor HP</label>
                                <input type="text" class="form-control" v-model="form.Nomor_HP" placeholder="Masukan Nomor HP">
                            </div>
                            <div class="form-group">
                                <label >Email</label>
                                <input type="text" class="form-control" v-model="form.email" placeholder="Masukan email">
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="text" class="form-control" v-model="form.password" placeholder="Masukan password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan    </button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                levels:{},
                users:{},
                form: new Form({
                    id:"",
                    name:"",
                    level_id:"",
                    Nomor_HP:"",
                    email:"",
                    password:""
                })
            };
        },
        methods:{
            showModal(){
                this.form.reset();
                $("#modalmuncul").modal("show");
            },
            loadData(){
                axios.get('api/ambildatalevel').then(({data})=>(this.levels=data));

                axios.get('api/user').then(({data})=>(this.users=data));
            },
            simpanData(){
                this.form
                .post('api/user').then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil Tersimpan'
                    });
                    
                })
                .catch();
            }
        },
        created(){
            this.loadData();
            Fire.$on("refreshData", () =>{
                this.loadData();
            });
        }
    }
</script>
