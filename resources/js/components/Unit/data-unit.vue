<template>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Unit</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-success" @click="showModal" >Tambah Unit</button>
                        </div>    
                    </div>

                    <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>     
                                        <th>Nama Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr v-for="item in units" :key="item.id">
                                    <td>{{ item.Nama_Unit }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary mr-1">EDIT</button>
                                        <button class="btn btn-sm btn-danger ml-1" @click="deleteData(item.id)">DELETE</button>
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
                    <form @submit.prevent="simpanData()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label >Nama Unit Kerja</label>
                                <input type="text" class="form-control" v-model="form.Nama_Unit" placeholder="Masukan nama unit kerja">
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
                units:{},
                form: new Form({
                    id:"",
                    Nama_Unit:""
                })
            };
        },
        methods:{
            showModal(){
                this.form.reset();
                $("#modalmuncul").modal("show");
            },
            loadData(){
                axios.get('api/ambildataunit').then(({data}) => (this.units=data));
            },
            simpanData(){
                this.form
                .post('api/ambildataunit').then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil Tersimpan'
                    });
                    
                })
                .catch();
            },
            deleteData(id) {
                this
                    .$swal
                    .fire({
                        title: 'hapus unit?',
                        text: "Unit Kerja ini Akan di Hapus",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#BF2222FF',
                        cancelButtonColor: '#A1A1A1FF',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.value) {
                            let uri = `/api/ambildataunit/${id}`;
                            this
                                .axios
                                .delete(uri)
                                .then(this.$router.push({path: '/data-unit'}))
                                .catch();
                        }
                    })
            },
            
        },
        created(){
            this.loadData();
            Fire.$on("refreshData", () =>{
                this.loadData();
            });
        }
    }
</script>
