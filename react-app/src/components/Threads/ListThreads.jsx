import { useState, useEffect } from 'react'
import axios from 'axios'
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';

function Threads() {
    const [threads, setThreads] = useState(null)
    
    useEffect(() => {
        axios.get('http://localhost/project-f/api/test')
        .then(response => (
            setThreads(response.data)
        ))
    }, [])

    return (
      <div>
        <table className="table table-hover">
            <thead>
                <tr>
                <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>

                { threads ? (
                    threads.map((thread, index) => {
                        return (
                            <tr key={thread.id}>
                                <th scope="row">
                                
                            <Link className="nav-link" to="/">
                            {thread.title}
                            </Link></th>
                            </tr>
                        )
                    })
                ) : (
                    <tr>
                    <td>loading ...</td>
                    </tr>
                    )
                }
            </tbody>
        </table>
      </div>
    )
  }
  
  export default Threads
  