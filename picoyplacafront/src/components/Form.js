import React from 'react';
import Paper from '@material-ui/core/Paper';
import Button from '@material-ui/core/Button';
import TextField from '@material-ui/core/TextField';
import Select from '@material-ui/core/Select';
import InputLabel from '@material-ui/core/InputLabel';
import axios from 'axios';



class Form extends React.Component{
	state={
		plate:"",
		day:"",
		month:"",
		year:"",
		hour:"",
		minute:""
	}
	
	setData=()=>{
      axios.post('http://localhost:8000/api/ver',{
	  plate: this.state.plate,
	  day:this.state.day,
	  month:this.state.month,
	  year:this.state.year,
	  hour:this.state.hour,
	  minute:this.state.minute
	  })
	  .then((data)=>{
		  if(data.data==1)
			  alert("You can be on the road!");
		  else
			  alert("You can't be on the road!! Your plate has a restriction");
		  
	  })
	  }
	 
	 handleChange = event => {
    this.setState({ [event.target.name]: event.target.value });
  }
		
	render(){
		return(
			<form>	
				<Paper>
					<TextField required label="Plate" name="plate" onChange={this.handleChange}/><br/><br/>
					<TextField required label="Day (dd)" name="day" onChange={this.handleChange}/>
					<TextField required label="Month (mm)" name="month" onChange={this.handleChange}/>
					<TextField required label="Year (yyyy)" name="year" onChange={this.handleChange}/><br/><br/>
					<TextField required label="Hour" name="hour" onChange={this.handleChange}/>
					<TextField required label="Minute" name="minute" onChange={this.handleChange}/><br/><br/>
					<Button color="primary" variant="contained" onClick={this.setData}>INGRESAR</Button>
				</Paper>
			</form>
		)
	}
}

export default Form;