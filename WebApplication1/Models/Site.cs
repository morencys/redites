using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplication1.Models
{
    public class Site
    {
        public List<Post> post { get; set; }

        public List<Comment> comment { get; set; }

        public List<Topic> topic { get; set; }
    }
}
