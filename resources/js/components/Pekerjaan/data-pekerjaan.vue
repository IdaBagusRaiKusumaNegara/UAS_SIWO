<template>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pekerjaan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-success" @click="showModal" >Tambah Pekerjaan</button>
                        </div>    
                    </div>
                    <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>     
                                        <th>Nama Customer</th>
                                        <th>Nomor Hp</th>
                                        <th>Unit Kerja</th>
                                        <th>Kategori Pekerjaan</th>
                                        <th>Deskripsi</th>
                                        <th>Status Pekerjaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr v-for="item in pekerjaans" :key="item.id">
                                    <td>{{ item.Nama_Customer }}</td>
                                    <td>{{ item.Nomor_HP }}</td>
                                    <td>{{ item.unit_kerja_id }}</td>
                                    <td>{{ item.Kategori_Pekerjaan }}</td>
                                    <td>{{ item.Deskripsi_Pekerjaan }}</td>
                                    <td>{{ item.Status_Pekerjaan }}</td>
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
                    <form @submit.prevent="simpanData()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label >Nama Customer</label>
                                <input type="text" class="form-control" v-model="form.Nama_Customer" placeholder="Masukan nama customer">
                            </div>
                            <div class="form-group">
                                <label >Nomor HP</label>
                                <input type="text" class="form-control" v-model="form.Nomor_HP" placeholder="Masukan Nomor HP">
                            </div>
                            <div class="form-group">
                                <label >Unit Kerja</label>
                                <select class="form-control select2" v-model="form.unit_kerja_id">
                                    <option value>Pilih Unit Kerja</option>
                                    <option v-for="item in units" :key="item.id" :value="item.id">{{item.Nama_Unit}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Kategori Pekerjaan</label>
                                <select class="form-control select2" v-model="form.Kategori_Pekerjaan">
                                    <option value>Pilih Kategori Pekerjaan</option>
                                    <option value='Software'>Software</option>
                                    <option value='Hardware'>Hardware</option>
                                    <option value='Jaringan'>Jaringan</option>
                                    <option value='Lain-Lain'>Lain-Lain</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Deskripsi Pekerjaan</label>
                                <textarea class="form-control" rows="3" v-model="form.Deskripsi_Pekerjaan" placeholder="Masukan Deskripsi Pekerjaan"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status Pekerjaan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" v-model="form.Status_Pekerjaan" value="Pending">
                                    <label class="form-check-label">Pending</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input  " type="radio" v-model="form.Status_Pekerjaan" value="Process">
                                    <label class="form-check-label">Process</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input  " type="radio" v-model="form.Status_Pekerjaan" value="Completed">
                                    <label class="form-check-label">Completed</label>
                                </div>
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
                pekerjaans:{},
                units:{},
                form: new Form({
                    id:"",
                    Nama_Customer:"",
                    Nomor_HP:"",
                    unit_kerja_id:"",
                    Kategori_Pekerjaan:"",
                    Deskripsi_Pekerjaan:"",
                    Status_Pekerjaan:""
                })
            };
        },
        methods:{
            showModal(){
                $("#modalmuncul").modal("show");
            },
            loadData(){
                axios.get('api/pekerjaan').then(({data}) => (this.pekerjaans=data));
                axios.get('api/ambildataunit').then(({data}) => (this.units=data));
            },
            simpanData(){
                this.form
                .post('api/pekerjaan').then(() => {
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
