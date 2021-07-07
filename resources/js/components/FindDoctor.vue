<template>
    <div>
        <div class="card m-2">
            <div class="card-header">Chercher un docteur</div>
            <div class="card-body">
                <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar" :disabledDates="disabledDates" @selected="customDate" v-model="time" :inline='true'></datepicker>
            </div>
        </div>
        
        <div class="card m-2">
            <div class="card-header">Doctors</div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <select name="department" id="" class="form-control" v-model="specialite" @change="filterDoctorsBySpecialite">
                                <option disabled value="">specialité</option>
                                <option value="">Tous</option>
                                <option value="Cardiologist">Cardiologist</option>
                                <option value="Dermatologists">Dermatologists</option>
                                <option value="Anesthesiologists">Anesthesiologists</option>
                                <option value="ORL">ORL</option>
                                <option value="Chirurgie">Chirurgie</option>
                                <option value="Pédiatrie">Pédiatrie</option>
                                <option value="Neurologie">Neurologie</option>
                                <option value="Radiologie">Radiologie</option>
                                <option value="Oncologie">Oncologie</option>
                            </select>
                        </div>                    
                        <div class="col-md-6">
                            <select name="" id="" class="form-control" v-model="ville"  @change="filterDoctorsByVille">
                                <option disabled value="">Ville</option>
                                <option value="">Tout les villes</option>
                                <option value="agadir">agadir</option>
                                <option value="casablanca">casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="marrakech">Marrakech</option>
                                <option value="el jadida">El jadida</option>
                                <option value="errachidia">Errachidia</option>
                                <option value="fes">Fes</option>
                                <option value="kenitra">Kenitra</option>
                                <option value="khenifra">Khenifra</option>
                                <option value="khouribga">Khouribga</option>
                                <option value="meknes">Meknes</option>
                                <option value="nador">Nador</option>
                                <option value="ouarzazat">Ouarzazat</option>
                                <option value="oujda">Oujda</option>
                                <option value="safi">Safi</option>
                                <option value="settat">Settat</option>
                                <option value="sale">Sale</option>
                                <option value="tanger">Tanger</option>
                                <option value="taza">Taza</option>
                                <option value="tetouan">Tetouan</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <pulse-loader :loading="loading"></pulse-loader>
                    </div>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Spécialité</th>
                            <th>Ville</th>
                            <th>Réserver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d,index) in filtredDoctors" v-bind:key="index">
                            <td>{{index+1}}</td>
                            <td>
                                <img :src="'/images/'+d.doctor.image" width="80" alt="doctor image" style="border-radius:10%">
                            </td>
                            <td>{{d.doctor.name}}</td>
                            <td>{{d.doctor.department}}</td>
                            <td>{{d.doctor.ville}}</td>
                            <td>
                                <a :href="'/new-appointment/'+d.user_id+'/'+d.date"><button class="btn btn-primary">Booking</button></a>
                            </td>
                        </tr>
                        <td v-if="filtredDoctors.length==0">No doctor available for this date</td>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</template>

<script>
import datepicker from 'vuejs-datepicker'
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
import moment from 'moment'
export default {

    data() {
        return {
            time:'',
            doctors:[],
            filtredDoctors:[],
            filtred:[],
            loading: false,
            disabledDates:{
                to:new Date(Date.now()- 8640000)
            },
            specialite: '',
            ville: '',
            
        }
    },

    components:{
        datepicker,
        PulseLoader
    },

    methods:{
        customDate(date){
            this.loading = true, 
            this.time = moment(date).format('YYYY-MM-DD');
            console.log(this.time);
            axios.post('/api/finddoctors', {date:this.time}).then((response)=>{
                setTimeout(()=>{
                this.doctors = response.data,
                this.filterDoctorsBySpecialite()    
                this.loading= false
                }, 1000)

        }).catch((error)=>{alert('error')})
        },

        filterDoctorsBySpecialite(){
            if (!this.specialite && !this.ville){
                return this.filtredDoctors = this.doctors
            }
            let vm = this

            if (!this.ville){
                    this.filtredDoctors = this.doctors.filter(function(obj){
                    return obj.doctor.department == vm.specialite;
                })
            }

            if (this.ville != '' ){
                if (this.specialite != '') {
                    this.filtredDoctors = this.doctors.filter(function(obj){
                        return obj.doctor.department == vm.specialite && obj.doctor.ville == vm.ville;
                    })
                }else{
                    this.filtredDoctors = this.doctors.filter(function(obj){
                        return obj.doctor.ville == vm.ville;
                    })
                }
            }
        },
        
        filterDoctorsByVille(){
            if (!this.specialite && !this.ville){
                return this.filtredDoctors = this.doctors
            }
            
            let vm = this

            if (!this.specialite){
                this.filtredDoctors = this.doctors.filter(function(obj){
                    return obj.doctor.ville == vm.ville;
                })
            }

            if (this.specialite != ''){
                if (this.ville != '') {
                    this.filtredDoctors = this.doctors.filter(function(obj){
                        return obj.doctor.ville == vm.ville && obj.doctor.department == vm.specialite ;
                    })
                }else{
                    this.filtredDoctors = this.doctors.filter(function(obj){
                        return obj.doctor.department == vm.specialite;
                    })
                }
            }
        }
    },
    mounted(){
        this.loading = true, 
        axios.get('/api/doctors/today').then((response)=>{
            this.doctors = response.data
            this.filterDoctorsBySpecialite()
            this.loading= false
        })
        
    },
}
</script>
<style scoped>
    .my-datepicker >>> .my-datepicker_calendar{
        width: 100%;
        height: 330px;
    }
</style>