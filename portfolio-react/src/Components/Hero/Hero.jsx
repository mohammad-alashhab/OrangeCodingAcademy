import React from "react";
import "./Hero.css";
import img from "../../assets/my-pic-modified.png";

const Hero = () => {
  return (
    <div className="box-1">
      <div className="box-1-container">
        <div className="hero-content">
          <div className="content-top">
            <p>
              <span className="color-secondary">Hi I am</span>
            </p>
            <h6>Mohammad Alashhab</h6>
            <h2>
              Web Developer
              <br />
              Full-stack
            </h2>
            <div className="hero-icon">
              <a href="https://www.facebook.com/share/skjyTsiye1det4Ns/?mibextid=qi2Omg">
                <i className="fa-brands fa-facebook-f"></i>
              </a>
              <a href="https://www.linkedin.com/in/mohamad-alashhab-6a492b1ba?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">
                <i className="fa-brands fa-linkedin-in"></i>
              </a>
              <a href="mailto:moh.t.alashhab@gmail.com">
                <i className="fa-solid fa-envelope"></i>
              </a>
              <a href="https://github.com/mohammad-alashhab">
                <i className="fa-brands fa-github"></i>
              </a>
            </div>
            <div className="hero-button">
              <a
                href="https://drive.google.com/file/d/179Qe3NOFhrE0hgrUXld24xZNarfXkmNs/view?usp=drivesdk"
                className="btn"
              >
                Download Cv
              </a>
            </div>
          </div>
          <div className="content-down">
            <div className="content-1">
              <span className="color">3+</span>
              <p>Projects</p>
            </div>
            <span className="split">|</span>
            <div className="content-1">
              <span className="color">2+</span>
              <p>Courses</p>
            </div>
            <span className="split">|</span>
            <div className="content-1">
              <span className="color">3+</span>
              <p>Internships</p>
            </div>
          </div>
        </div>
        <div className="image-hero">
          <div className="bg-img">
            <img src={img} alt="man" />
          </div>
        </div>
      </div>
    </div>
  );
};

export default Hero;
