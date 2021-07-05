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
                            <select name="department" id="" class="form-control" v-model="specialite" @change="filterDoctors">
                                <option disabled value="">specialité</option>
                                <option value="Cardiologist">Cardiologist</option>
                                <option value="Pédiatre">Pédiatre</option>
                                <option value="specialité">specialité</option>
                            </select>
                        </div>                    
                        <div class="col-md-6">
                            <select name="" id="" class="form-control" v-model="ville">
                                <option disabled value="">Ville</option>
                                <option value="agadir">agadir</option>
                                <option value="rabat">rabat</option>
                            </select>
                        </div>
                    </div>

                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d,index) in filtredDoctors" v-bind:key="index">
                            <td>{{index+1}}</td>
                            <td>
                                <img :src="'/images/'+d.doctor.image" width="80" alt="doctor image">
                            </td>
                            <td>{{d.doctor.name}} </td>
                            <td>{{d.doctor.department}} </td>
                            <td>
                                <a :href="'/new-appointment/'+d.user_id+'/'+d.date"><button class="btn btn-success">Booking</button></a>
                            </td>
                        </tr>
                        <td v-if="doctors.length==0">No doctor available for this date</td>
                    </tbody>
                </table>
                <div class="text-center">
                    <pulse-loader :loading="loading"></pulse-loader>
                </div>
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
                this.loading= false
                }, 1000)

        }).catch((error)=>{alert('error')})
        },

        filterDoctors(){
            if (!this.specialite ){
                return this.filtredDoctors = this.doctors
            }
            let vm = this
           this.filtredDoctors = this.doctors.filter(function(obj){
               return obj.doctor.department == vm.specialite 
           })
        }
    },
    mounted(){
        this.loading = true, 
        axios.get('/api/doctors/today').then((response)=>{
            this.doctors = response.data
            this.filterDoctors()
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