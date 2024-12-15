import React from 'react'
import './About.css'
import img from "../../assets/my-pic-modified.png";

const About = () => {
  return (
    <div className="box-2" id="about">
      <h2 className="h2-new">
        About <span className="color">Me</span>
      </h2>
      <div className="box-2-container">
        <div className="image-about">
          <div className="bg-img">
            <img src={img} alt="man" />
          </div>
        </div>
        <div id="tabs" className="nav-tab">
          <ul className="tab-items">
            <li>
              <a href="#tabs-1" className="tab-link active">
                Experience
              </a>
            </li>
            <li>
              <a href="#tabs-2" className="tab-link">
                Education
              </a>
            </li>
            <li>
              <a href="#tabs-3" className="tab-link">
                Courses
              </a>
            </li>
          </ul>
          <div className="tab-box">
            <div id="tabs-1">
              <div className="tab-content">
                <div className="content-left">
                  <h6>
                    <span className="color">Software Development Internship</span>
                  </h6>
                  <p>Company: Estarta Solutions</p>
                  <p>
                    Software Development Empowered by Estarta Solutions with a
                    focus on ASP.NET in backend development 90 hours.
                  </p>
                  <h6>
                    <span className="color">
                      Full Stack Asp.Net (MVC Core) Internship
                    </span>
                  </h6>
                  <p>Company: Education For Employment Jordan (EFE)</p>
                  <p>
                    Full Stack Asp.Net (MVC Core) Empowered by EFE Jordan and
                    implemented by giz in Princess Sumaya University for
                    Technology 80.
                  </p>
                  <h6>
                    <span className="color">
                      Mobile Application Development using Flutter Internship
                    </span>
                  </h6>
                  <p>Company: Digital Opportunity Trust Jordan (.dot)</p>
                  <p>
                    Mobile Application Development using Flutter Empowered by
                    UNICEF Jordan and Digital Opportunity Trust Jordan 120
                    hours.
                  </p>
                </div>
                <div className="content-right">
                  <p>Sep 2023 – Oct 2023</p>
                  <p>Aug 2023 – Sep 2023</p>
                  <p>Dec 2022 – Apr 2023</p>
                </div>
              </div>
            </div>
            <div id="tabs-2">
              <div className="tab-content">
                <div className="content-left">
                  <h6>
                    <span className="color">
                      Bachelor’s degree in Computer Science
                    </span>
                  </h6>
                  <p>University of Jordan | Amman, Jordan</p>
                </div>
                <div className="content-right">
                  <p>Oct 2019 – Jun 2023</p>
                </div>
              </div>
            </div>
            <div id="tabs-3">
              <div className="tab-content">
                <div className="content-left">
                  <h6>
                    <span className="color">Web Development Full Stack</span>
                  </h6>
                  <p>Company: Beprogrammer</p>
                  <h6>
                    <span className="color">Java Development</span>
                  </h6>
                  <p>Company: Beprogrammer</p>
                </div>
                <div className="content-right">
                  <p>Online 2021</p>
                  <p>Online 2021</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default About