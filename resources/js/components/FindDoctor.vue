<template>
    <div>
        <div class="card m-2">
            <div class="card-header">Find Doctors</div>
            <div class="card-body">
                <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar" :format="customDate" v-model="time" :inline='true'></datepicker>
            </div>
        </div>
        
        <div class="card m-2">
            <div class="card-header">Doctors</div>
            <div class="card-body">
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
                        <tr v-for="(d,index) in doctors" v-bind:key="index">
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
                        <td v-if="doctors.length==0">No doctor available for {{this.time}}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import datepicker from 'vuejs-datepicker'
import moment from 'moment'
export default {

    data() {
        return {
            time:'',
            doctors:[]
        }
    },

    components:{
        datepicker
    },

    methods:{
        customDate(date){
            this.time = moment(date).format('YYYY-MM-DD');
            axios.post('/api/finddoctors', {date:this.time}).then((response)=>{
            this.doctors = response.data
        }).catch((error)=>{alert('error')})
        }
    },
    mounted(){
        axios.get('/api/doctors/today').then((response)=>{
            this.doctors = response.data
        })
    }
}
</script>
<style scoped>
    .my-datepicker >>> .my-datepicker_calendar{
        width: 100%;
        height: 330px;
    }
</style>