
class Number
  attr_reader :a
  def initialize(a)
    @a = a.transpose
  end

  def to_s
    d = a.reduce(0) do |carry1, b|
      carry1 += b.reduce(0) do |carry2, char|
        case char
        when '_'
          add = 1
        when '|'
          add = 2
        else
          add = 0
        end
        carry2 += add
      end
      carry1
    end
    {
      10 => "0"
    }.fetch(d)
  end
end

class Account
  def initialize(a)
    @a = a.transpose.each_slice(3).map { |a| Number.new(a) }.map(&:to_s)
  end

  def to_s
    @a.join("")
  end
end


class Accounts
  # include Enumerable

  attr_reader :accounts
  def initialize(numbers_cases)
    accounts_arrays = numbers_cases.split("\n")
                           .map(&:chars)
                           .each_slice(4).map { |a| Account.new(a) }.map(&:to_s)
    @accounts = accounts_arrays
  end

  def [](index)
    accounts[index].to_s
  end
end