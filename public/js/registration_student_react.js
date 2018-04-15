class RegistrationStudent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            firstName: '',
            lastName: '',
            gender: '',
            department: '',
            rollNumber: null
        }
        this.handleInputOnChange = this.handleInputOnChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleInputOnChange(event) {

        const target = event.target;
        // const value = target.type === 'checkbox' ? target.checked : target.value;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit(event) {
                
        event.preventDefault();
        let reqBody = {
            firstName: this.state.firstName,
            lastName: this.state.lastName,
            gender: this.state.gender,
            department:this.state.department,
            rollNumber:this.state.rollNumber
          };
        const data = new FormData(event.target);

        fetch('/student/save', {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
              },
            //body: data,
            body: JSON.stringify(reqBody),
        }).then(res => {
            window.location.href = "/students/information";
        }).catch(err => err);
        //alert(this.state.firstName + ' Your data is saved' );
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <label>
                    First Name:
                    <input
                        name="firstName"
                        type="text"
                        value={this.state.firstName}
                        onChange={this.handleInputOnChange} />
                </label>
                <br />
                <label>
                    Last Name:
                    <input
                        name="lastName"
                        type="text"
                        value={this.state.lastName}
                        onChange={this.handleInputOnChange} />
                </label>
                <br />
                <label>
                    Department:
                    <input
                        name="department"
                        type="text"
                        value={this.state.department}
                        onChange={this.handleInputOnChange} />
                </label>
                <br />
                <label>
                    Roll Number:
                    <input
                        name="rollNumber"
                        type="text"
                        value={this.state.rollNumber}
                        onChange={this.handleInputOnChange} />
                </label>
                <br />
                <label>
                    Gender:
                    <input
                        name="gender"
                        type="text"
                        value={this.state.gender}
                        onChange={this.handleInputOnChange} />
                </label>
                <input type="submit" value="Save" />
            </form>
        );
    }
}