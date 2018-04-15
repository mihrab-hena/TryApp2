
class User extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      error: null,
      isLoaded: false,
      users: []
    };
  }

  componentDidMount() {
    fetch("/user/info/react")
      .then(res => res.json())
      .then(
        (result) => {
          console.log(result);
          this.setState({            
            isLoaded: true,
            users: result
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
    const { error, isLoaded, users } = this.state;
    if (error) {
      return <div>Error: {error.message}</div>;
    } else if (!isLoaded) {
      return <div>Loading...</div>;
    } else {
      console.log(users);
      return (
        <ul>
          {users.map(user => (
            <li key={user.id}>
              Name : {user.firstName} {user.lastName} > Gender : {user.gender}
            </li>
          ))}
        </ul>
      );
    }
  }
}