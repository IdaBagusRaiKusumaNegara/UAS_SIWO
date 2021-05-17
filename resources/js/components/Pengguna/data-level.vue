<template>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Level</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-success" @click="showModal" >Tambah Level</button>
                        </div>   
                    </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr v-for="item in levels" :key="item.id">
                                    <td>{{ item.Nama_Level }}</td>
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
                        <div class="modal fade" id="modalmuncul" tabindex="-1" role="dialog" aria-labelledby="modalmuncul1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form >
                        <div class="modal-body">
                            <div class="form-group">
                                <label >Nama Level</label>
                                <input type="text" class="form-control" v-model="form.Nama_Level" placeholder="Masukan nama level">
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
                form: new Form({
                    id:"",
                    Nama_Level:"",
                })

            };
        },
        methods:{
            showModal(){
                $("#modalmuncul").modal("show");
            },
            loadData(){
                axios.get('api/ambildatalevel').then(({data})=>(this.levels=data));
            }
        },
        created(){
            this.loadData();
        }
    }
</script>
