import React from 'react'
import './index.css'
import Navbar from './Components/Navbar/Navbar.jsx'
import Hero from './Components/Hero/Hero.jsx'
import About from './Components/About/About.jsx'
import Skills from './Components/Skills/Skills.jsx'
import Projects from './Components/Projects/Projects.jsx'
import Contact from './Components/Contact/Contact.jsx'
import Footer from './Components/Footer/Footer.jsx'

const App = () => {
  return (
    <div className = "container" id="home">
      <Navbar/>
      <Hero/>
      <About/>
      <Skills/>
      <Projects/>
      <Contact/>
      <Footer/>
    </div>
  )
}

export default App