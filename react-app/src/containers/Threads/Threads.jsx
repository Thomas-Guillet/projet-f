import { useState, useEffect } from 'react'
import axios from 'axios'
import ListThreads from '../../components/Threads/ListThreads'

function Threads() {
    return (
      <div>
      <div className="page-header">
              <h1>threads</h1>
            </div>
      
      <ListThreads />
      </div>
    )
  }
  
  export default Threads
  