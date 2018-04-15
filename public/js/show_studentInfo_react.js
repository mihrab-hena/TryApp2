
class Student extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        error: null,
        isLoaded: false,
        students: []
      };
    }
  
    componentDidMount() {
      fetch("/student/info/react")
        .then(res => res.json())
        .then(
          (result) => {
            console.log(result);
            this.setState({            
              isLoaded: true,
              students: result
            });
          },
          // Note: it's important to handle errors here
          // instead of a catch() block so that we don't swallow
          // exceptions from actual bugs in components.
          (error) => {
            this.setState({
              isLoaded: true,
              error
            });
          }
        )
    }
  
    render() {    
      const { error, isLoaded, students } = this.state;
      if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        //console.log(students);
        return (
          <ul>
            {students.map(student => (
              <li key={student.id}>
                Name : {student.firstName} {student.lastName} | Department : {student.department} | Roll : {student.rollNumber}
              </li>
            ))}
          </ul>
        );
      }
    }
  }